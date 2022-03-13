<?php

namespace App\Http\Controllers;

use App\Frage;
use App\YouApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class YouTubeController extends Controller
{
    public function getComments()
    {
        try {

            $api = YouApi::latest()->first();
            Bugsnag::leaveBreadcrumb($api);

            if ($api != null) {
                $pg = '&pageToken=' . $api->pageToken;
                $lastCallTime = new Carbon($api->created_at);
                $now = new Carbon();
                $timeDiff = $lastCallTime->diffInSeconds($now);
                Bugsnag::leaveBreadcrumb($timeDiff);
            } else {
                $pg = null;
                $timeDiff = 30;
            }

            if($timeDiff > 28) {
                $request = Http::get('https://youtube.googleapis.com/youtube/v3/liveChat/messages?liveChatId=' . config('faq.chat_id') . '&part=snippet,authorDetails' . $pg . '&key=' . config('faq.api_key'));

                $request = $request->json();
                Bugsnag::leaveBreadcrumb($request);

                $run = new YouApi();
                $run->pageToken = $request['nextPageToken'];
                $run->save();
                //dd($run);

                foreach ($request['items'] as $item) {
                    $comment = new Frage();
                    $snippet = $item['snippet'];
                    $authorDetails = $item['authorDetails'];
                    $comment->frage = $snippet['displayMessage'];
                    $comment->autor = $authorDetails['displayName'];
                    $comment->save();
                }
            }
        } catch (Throwable $e) {
            Bugsnag::notifyException($e);
        }
    }
}
