<?php

namespace NotificationChannels\Hubtel\SMSClients;

use GuzzleHttp\Client;
use NotificationChannels\Hubtel\HubtelMessage;
use NotificationChannels\Hubtel\Exceptions\InvalidConfiguration;

class HubtelSMSClient
{
    
    public $client;

    public $apiKey;

    public $apiSecret;
    
    public function __construct($apiKey,$apiSecret,Client $client)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->client = $client;
    }

    public function send(HubtelMessage $message)
    {
        return $this->client->get($this->getApiURL().$this->buildMessage($message,$this->apiKey,$this->apiSecret));
    }

    public function getApiURL()
    {
        return 'https://api.hubtel.com/v1/messages/send?';
    }

    public function buildMessage(HubtelMessage $message,$apiKey,$apiSecret)
    {
        $this->validateConfig($apiKey,$apiSecret);
        
        $params = array("ClientId"=>$apiKey,"ClientSecret" => $apiSecret);

        foreach(get_object_vars($message) as $property => $value)
        {
            if(!is_null($value))
            {
                $params[ucfirst($property)] = $value;
            }
        }
        
        return http_build_query($params);
    }

    public function validateConfig($apiKey,$apiSecret)
    {
        if(is_null($apiKey))
        {
            throw InvalidConfiguration::apiKeyNotSet();
        }

        if(is_null($apiSecret))
        {
            throw InvalidConfiguration::apiSecretNotSet();
        }
        return $this;
    }
}