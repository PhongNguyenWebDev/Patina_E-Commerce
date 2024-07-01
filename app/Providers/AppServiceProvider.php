<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\SocialNetwork;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\View\Components\navlink;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $cart = Cart::where('user_id', auth()->id())->get();
            $favorite = Favorite::where('user_id', auth()->id())->get();
            $socialn = SocialNetwork::all();
            $view->with(compact('cart', 'favorite', 'socialn'));
        });
        Paginator::useBootstrap();

        // Blade::component('nav-link', navlink::class);
    }
}
