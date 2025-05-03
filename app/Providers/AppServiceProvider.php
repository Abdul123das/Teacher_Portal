<?php

namespace App\Providers;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepository::class, function ($app) {
            return new TeacherRepository($app->make('App\Models\Teacher'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
