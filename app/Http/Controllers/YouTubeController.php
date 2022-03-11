<?php

namespace App\Http\Controllers;

use App\Frage;
use App\YouApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class YouTubeController extends Controller
{
    public function getComments()
    {

            $api = YouApi::latest()->first();

            if ($api != null) {
                $pg = '&pageToken=' . $api->pageToken;
                $lastCallTime = new Carbon($api->created_at);
                $now = new Carbon();
                $timeDiff = $lastCallTime->diffInSeconds($now);
            } else {
                $pg = null;
                $timeDiff = 30;
            }

            if($timeDiff > 28) {
                $request = Http::get('https://youtube.googleapis.com/youtube/v3/liveChat/messages?liveChatId=' . config('faq.chat_id') . '&part=snippet,authorDetails' . $pg . '&key=' . config('faq.api_key'));

                $request = $request->json();

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
        
    }
}
