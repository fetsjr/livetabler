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
        $this->bootTagCompiler();
        $this->bootDirectives();
        $this->bootPublishing();
    }

    protected function bootComponentPath(): void
    {
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
    }

    protected function bootDirectives(): void
    {
        Blade::directive('tablerStyles', function () {
            return '<link rel="stylesheet" href="{{ asset(\'vendor/tabler/tabler.min.css\') }}">';
        });

        Blade::directive('tablerScripts', function () {
            return '<script src="{{ asset(\'vendor/tabler/tabler.js\') }}" defer></script>';
        });
    }

    protected function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/css' => public_path('vendor/tabler'),
                __DIR__.'/../resources/js' => public_path('vendor/tabler'),
            ], 'tabler-assets');
        }
    }

    protected function bootTagCompiler(): void
    {
        $compiler = new TablerTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app('blade.compiler')->precompiler(function ($in) use ($compiler) {
            return $compiler->compile($in);
        });
    }
}
