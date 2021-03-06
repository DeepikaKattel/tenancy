<?php

namespace App\Listeners;

use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Affects\Connections\Events\Drivers\Configuring;
use Tenancy\Affects\Connections\Contracts\ProvidesConfiguration;

class ResolveTenantConnection implements ProvidesConfiguration
{
    /**
     * Create the event listener.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Resolving $event) {
        return $this;
    }

    public function configure(Tenant $tenant): array {
        $config = [];
        event(new Configuring($tenant, $config, $this));
        return $config;
    }

}
