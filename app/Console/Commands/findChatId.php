<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class findChatId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faq:findChatId {liveId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command finds the chat ID from a given stream id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $liveId = $this->argument('liveId');
        if(!$liveId) {
            $this->info('------------------------');
            $this->info('INFO:');
            $this->info('The live stream id for this stream https://www.youtube.com/watch?v=T5MOADZ50sE');
            $this->info('');
            $this->info('Is: T5MOADZ50sE');
            $this->info('------------------------');
            $liveId = $this->ask('Please type the live stream id?');
        }

        $request = Http::get('https://www.googleapis.com/youtube/v3/videos?part=liveStreamingDetails&id='.$liveId.'&key='.config('faq.api_key'));

        $request = $request->json();

        $liveStreamingDetails = $request['items'][0]['liveStreamingDetails'];
        
        $this->line('');
        $this->info('------------------------');
        $this->line('');
        $this->line('Live Chat Id:');
        $this->line('');
        $this->info($liveStreamingDetails['activeLiveChatId']);
        $this->line('');
        $this->line('');
        $this->line('');
        $this->info('------------------------');
        $this->line('');
    }
}
