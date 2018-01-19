<?php

namespace App\Providers;

use App\Cart;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        view()->composer(['admin.pages.mailbox.index', 'admin.partials.header', 'layouts.master'], function ($view) {
            $messages = Contact::all();
            $unread_count = Contact::where('read', 'false')->count();
            $unread_messages = Contact::where('read', 'false')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
            $data = array(
                'messages' => $messages,
                'unread_count' => $unread_count,
                'unread_messages' => $unread_messages,
            );
            if (Auth::check()) {
                $cart_count = Cart::where('user_id', Auth::id())->count();
                $data += array('cart_count' => $cart_count
                );
            }
            $view->with($data);
        });
        if (env('REDIRECT_HTTPS')) {
            $url->forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path().'../public_html';
        });
    }
}
