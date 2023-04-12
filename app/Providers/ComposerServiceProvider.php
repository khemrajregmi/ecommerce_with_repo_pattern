<?php

namespace Kerung\Providers;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerview();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composerview()
    {
        view()->composer(
            'home.layouts.partials.homepageheader', 'Kerung\Http\ViewComposers\HeaderComposer'
        );
        view()->composer(
            'home.includes.homepagenavbar', 'Kerung\Http\ViewComposers\HeaderComposer'
        );
        view()->composer(
            'home.homepage', 'Kerung\Http\ViewComposers\HeaderComposer'
        );
    }
}
