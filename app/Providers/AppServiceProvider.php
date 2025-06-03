<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\EmailSettingRepositoryInterface;
use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;
use App\Repositories\Interfaces\MaintenanceModeRepositoryInterface;

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
        $email = app(EmailSettingRepositoryInterface::class)->getFirst();
        $maintenance = app(MaintenanceModeRepositoryInterface::class)->getMaintenanceMode();

        if( $email) {
            config([
                'mail.mailers.smtp.transport' => $email->mail_driver,
                'mail.mailers.smtp.host' => $email->mail_host,
                'mail.mailers.smtp.port' => $email->mail_port,
                'mail.mailers.smtp.username' => $email->mail_username,
                'mail.mailers.smtp.password' => base64_decode($email->mail_password),
                'mail.mailers.smtp.encryption' => $email->mail_encryption,
                'mail.from.address' => $email->mail_from_address,
                'mail.from.name' => $email->mail_from_name,
            ]);
        }

        // Set general settings
        if ($general) {
            config([
                'app.name' => $general->site_name,
                'app.timezone' => $general->timezone,
            ]);
        }
        view()->share([
            'generalSetting' => $general,
            'maintenance' => $maintenance,
        ]);
    }
}
