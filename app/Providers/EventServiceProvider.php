<?php

namespace App\Providers;


use App\Listeners\ConfigureTenantDatabase;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Tenancy\Hooks\Database\Events\Drivers\Configuring as DatabaseConfigEvent;
use Tenancy\Affects\Connections\Events\Resolving;
use App\Listeners\ResolveTenantConnection;
use Tenancy\Affects\Connections\Events\Drivers\Configuring as ConnectionConfigEvent;
use App\Listeners\ConfigureTenantConnection;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DatabaseConfigEvent::class => [
            ConfigureTenantDatabase::class
        ],
        Resolving::class => [
            ResolveTenantConnection::class
        ],
        ConnectionConfigEvent::class => [
            ConfigureTenantConnection::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
