<?php

namespace Krist4lle;

use Illuminate\Support\ServiceProvider;

class DNSServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(DNSServiceContract::class, DNSService::class);
    }
}