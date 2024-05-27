<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('show-album', function (User $user, Album $album) {
            return DB::table('bibliotecas')
                ->where('user_id', $user->id)
                ->where('album_id', $album->id)
                ->exists();
        });
    }
}
