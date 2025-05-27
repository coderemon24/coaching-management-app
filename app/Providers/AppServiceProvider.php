<?php

namespace App\Providers;

use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

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
        $general = app(GeneralSettingRepositoryInterface::class)->getFirst();
        if ($general) {
            config([
                'app.name' => $general->site_name,
                'app.timezone' => $general->timezone,
            ]);
        }
        view()->share('generalSetting', $general);
    }
}
