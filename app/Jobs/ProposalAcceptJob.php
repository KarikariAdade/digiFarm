<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProposalAcceptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public $tries = 5;

    public $timeout = 200;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;

        $msg = 'Dear '.$data['name'].', your proposal to '.$data['company_name'].' has been approved. Contact '.$data['company_name'].' on '. $data['company_phone'].' or '.$data['company_email'];
        $fields = [
            'sender' => 'LBH',
            'message' => $msg,
            'recipients' => [
                $this->data['phone']
            ]
        ];

        $this->makeOtpRequest($fields);
    }

    protected function makeOtpRequest($fields)
    {
        $url = 'https://devapi.fayasms.com/messages';

        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = 'fayasms-developer: 17596282.BD8nlMwlSlVUkXBvAa6uzLatjqBSDJpu';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        $result = json_decode($result, TRUE);
        curl_close($ch);

        return $result;
    }
}
