<?php

namespace NotificationChannels\Hubtel;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use NotificationChannels\Hubtel\SMSClients\HubtelSMSClient;

class HubtelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/hubtel.php' => config_path('hubtel.php'),
        ]);

        $this->app->when(HubtelChannel::class)
            ->needs(HubtelSMSClient::class)
            ->give(function () {
                $config = config('hubtel.account');

                return new HubtelSMSClient(
                    $config['key'],
                    $config['secret'],
                    new Client
                );
            });
    }
}
