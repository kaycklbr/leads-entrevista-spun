<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ProcessLead implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $leadData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($leadData)
    {
        $this->leadData = $leadData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        usleep(600000);

        $client = new Client();

        $res = $client->post(env('EXTERNAL_LEAD_STORE_ENDPOINT'), [
            'form_params' => [
                'name' => $this->leadData->name,
                'email' => $this->leadData->email,
            ]
        ]);

        \Log::debug($res->getBody()->getContents());
        
    }
}
