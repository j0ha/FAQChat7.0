<?php

namespace App\Http\Controllers;

use App\Frage;
use App\YouApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    public function getComments() {
        $api = YouApi::latest()->first();

        $request = Http::get('https://youtube.googleapis.com/youtube/v3/liveChat/messages?liveChatId='.env('CHAT_ID').'&part=snippet&pageToken='.$api->pageToken.'&key='.env('API_KEY'));

        $request = $request->json();
        //dd($request);

        $run = new YouApi();
        $run->pageToken = $request['nextPageToken'];
        $run->save();

        foreach ($request['items'] as $item) {
            $comment = new Frage();
            $snippet = $item['snippet'];
            $comment->frage = $snippet['displayMessage'];
            $comment->autor = 'YouTube Chat';
            $comment->save();
        }
        return 'done';
    }
}
