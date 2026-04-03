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
            return <<<'HTML'
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler.min.css') }}">
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler-vendors.min.css') }}">
            HTML;
        });

        Blade::component('tabler::icon', \Tabler\View\Components\Icon::class);
        Blade::component('tabler::button', \Tabler\View\Components\Button::class);
        Blade::component('tabler::alert', \Tabler\View\Components\Alert::class);
        Blade::component('tabler::avatar', \Tabler\View\Components\Avatar::class);
        Blade::component('tabler::card', \Tabler\View\Components\Card::class);
        Blade::component('tabler::badge', \Tabler\View\Components\Badge::class);
        Blade::component('tabler::progress', \Tabler\View\Components\Progress::class);
        Blade::component('tabler::checkbox', \Tabler\View\Components\Checkbox::class);
        Blade::component('tabler::input', \Tabler\View\Components\Input::class);
        Blade::component('tabler::dropdown', \Tabler\View\Components\Dropdown::class);
        Blade::component('tabler::table', \Tabler\View\Components\Table::class);
        Blade::component('tabler::accordion', \Tabler\View\Components\Accordion::class);
        Blade::component('tabler::accordion-item', \Tabler\View\Components\AccordionItem::class);
        Blade::component('tabler::timeline', \Tabler\View\Components\Timeline::class);
        Blade::component('tabler::timeline-item', \Tabler\View\Components\TimelineItem::class);
        Blade::component('tabler::breadcrumb', \Tabler\View\Components\Breadcrumb::class);
        Blade::component('tabler::breadcrumb-item', \Tabler\View\Components\BreadcrumbItem::class);
        Blade::component('tabler::steps', \Tabler\View\Components\Steps::class);
        Blade::component('tabler::step-item', \Tabler\View\Components\StepItem::class);
        Blade::component('tabler::status', \Tabler\View\Components\Status::class);
        Blade::component('tabler::modal', \Tabler\View\Components\Modal::class);
        Blade::component('tabler::select', \Tabler\View\Components\Select::class);
        Blade::component('tabler::datepicker', \Tabler\View\Components\DatePicker::class);
        Blade::component('tabler::autocomplete', \Tabler\View\Components\Autocomplete::class);
        Blade::component('tabler::layout', \Tabler\View\Components\Layout::class);
        Blade::component('tabler::navbar', \Tabler\View\Components\Navbar::class);
        Blade::component('tabler::sidebar', \Tabler\View\Components\Sidebar::class);
        Blade::component('tabler::page-header', \Tabler\View\Components\PageHeader::class);
        Blade::component('tabler::page-body', \Tabler\View\Components\PageBody::class);
        Blade::component('tabler::skeleton', \Tabler\View\Components\Skeleton::class);
        Blade::component('tabler::ribbon', \Tabler\View\Components\Ribbon::class);
        Blade::component('tabler::chart', \Tabler\View\Components\Chart::class);
        Blade::component('tabler::datatable', \Tabler\View\Components\Datatable::class);
        Blade::component('tabler::dropzone', \Tabler\View\Components\Dropzone::class);

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
                __DIR__.'/../resources/fonts' => public_path('vendor/fonts'),
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
