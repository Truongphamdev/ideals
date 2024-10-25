<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        cache()->forget('topUsers');

        $topUsers = Cache::remember('topUsers',now()->addMinute(5),function(){
            return User::withCount('ideals')
                    ->orderBy('ideals_count', 'desc')
                    ->limit(5)
                    ->get();
        });
        FacadesView::share(
            'topUsers', $topUsers
        );
    }
}
