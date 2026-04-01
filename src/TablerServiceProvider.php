<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TablerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->bootComponentPath();
    }

    /**
     * Register Blade anonymous components under the 'tabler' namespace.
     * This allows using <tabler:avatar>, <tabler:button>, etc.
     */
    public function bootComponentPath(): void
    {
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
    }
}
