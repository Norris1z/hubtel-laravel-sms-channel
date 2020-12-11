<?php

namespace NotificationChannels\Hubtel\Exceptions;

class InvalidConfiguration extends \Exception
{
    public static function apiKeyNotSet()
    {
        return new static('Hubtel API key not set');
    }

    public static function apiSecretNotSet()
    {
        return new static ('Hubtel API secret not set');
    }
}
