<?php

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    protected $api_key = "0acf5e43c2024e2b5ed7d3e3aca31e0a";
    protected $api_key_secret = "0780ddc3e3853025f21b66c0f406f715";

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "anselmeseri7@gmail.com",
                        'Name' => "Direction des Examens et Concours (DECO)"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 3904255,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() /*&& dd($response->getData())*/;
    }

}
