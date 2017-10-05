<?php

namespace NotificationChannels\Hubtel;

use Illuminate\Notifications\Notification;
use NotificationChannels\Hubtel\SMSClients\HubtelSMSClient;
use NotificationChannels\Hubtel\Exceptions\CouldNotSendNotification;

class HubtelChannel
{
    /**
     * @var HubtelSMSClient
     */
    public $client;

    public function __construct(HubtelSMSClient $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        if (is_null($message->from)) {
            throw CouldNotSendNotification::senderNotSetError();
        }

        if (is_null($message->to) && is_null($notifiable->routeNotificationFor('SMS'))) {
            throw CouldNotSendNotification::recipientNotSetError();
        }

        if (is_null($message->content)) {
            throw CouldNotSendNotification::contentNotSetError();
        }

        if (is_null($message->to) && !is_null($notifiable->routeNotificationFor('SMS'))) {
            $message->to = $notifiable->routeNotificationFor('SMS');
        }
        
        return $this->client->send($message);
    }
}
