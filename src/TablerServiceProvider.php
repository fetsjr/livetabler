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
    }

    protected function bootComponentPath(): void
    {
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
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
