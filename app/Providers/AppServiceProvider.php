<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $navbar_inverse = false;
        $pages = ['/',
            'rewards', 'influencers', 'advertisers',
            'networks', 'register/networks', 'register/payment',
            'promote', 'campaigns'
        ];
        foreach ($pages as $page) {
            if (request()->path() == $page || starts_with(request()->path(), $page))
                $navbar_inverse = true;
        }

        view()->share('navbar_inverse', $navbar_inverse);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
