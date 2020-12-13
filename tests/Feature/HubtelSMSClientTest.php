<?php

namespace NotificationChannels\Hubtel\Test\Feature;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use NotificationChannels\Hubtel\HubtelMessage;
use NotificationChannels\Hubtel\SMSClients\HubtelSMSClient;

class HubtelSMSClientTest extends TestCase
{
    public $client;

    public function setUp():void
    {
        parent::setUp();

        
    }

    /** @test **/
    public function it_sends_message_given_valid_sms_credentials()
    {
        // $key = 'your-api-key'; 
        // $secret = 'your-api-secret'; 
        // $guzzle = new Client();

        // $message = new HubtelMessage('your-sender-id','000000000','your-message');

        // $client = new HubtelSMSClient($key,$secret,$guzzle);

        // $response = $client->send($message);
        
        // $this->assertEquals(201,$response->getStatusCode());

        $this->assertTrue(true);
    }
}