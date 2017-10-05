<?php

namespace NotificationChannels\Hubtel\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function recipientNotSetError()
    {
        return new static("Recipient phone number not set");
    }

    public static function senderNotSetError()
    {
        return new static("Sender phone number not set");
    }

    public static function contentNotSetError()
    {
        return new static("Message content empty");
    }
}
