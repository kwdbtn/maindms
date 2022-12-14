<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        view()->composer(['memos.form', 'users.form'], function ($view) {
            $arr = [
                'users' => User::pluck('name', 'id'),
            ];

            $view->with('arr', $arr);
        });
    }
}
