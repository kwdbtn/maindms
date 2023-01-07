<?php

namespace App\Providers;

use App\Models\Memo;
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

        view()->composer('memos.form', function ($view) {
            if (auth()->user()->hasRole('assistant')) {
                $senders = User::where('id', auth()->user()->id)->first()->onbehalf->pluck('name', 'id');
            } else {
                $senders = User::where('id', auth()->user()->id)->pluck('name', 'id');
            }

            $view->with('senders', $senders);
        });

        view()->composer(['layouts.app'], function ($view) {
            if (auth()->check()) {
                $arr = [
                    'tray' => Memo::where('recipient', auth()->user()->id)
                        ->where('status', 'Sent')
                        ->count(),
                ];
            } else {
                $arr = [];
            }
            $view->with('arr', $arr);
        });
    }
}
