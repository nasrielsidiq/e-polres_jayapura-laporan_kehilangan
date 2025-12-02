<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\LaporanRepository::class,
            function ($app) {
                return new \App\Repositories\LaporanRepository(new \App\Models\LaporanKehilangan);
            }
        );

        $this->app->singleton(\App\Services\LogService::class, function ($app) {
            return new \App\Services\LogService();
        });

        $this->app->bind(\App\Services\LaporanService::class, function ($app) {
            return new \App\Services\LaporanService(
                $app->make(\App\Repositories\LaporanRepository::class),
                $app->make(\App\Services\LogService::class)
            );
        });

        $this->app->bind(
            \App\Repositories\Contracts\PelaporRepositoryInterface::class,
            \App\Repositories\Eloquent\PelaporRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\KategoriBarangRepositoryInterface::class,
            \App\Repositories\Eloquent\KategoriBarangRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\PetugasRepositoryInterface::class,
            \App\Repositories\Eloquent\PetugasRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
