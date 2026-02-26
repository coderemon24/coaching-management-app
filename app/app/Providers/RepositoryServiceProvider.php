<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $repositories = [
            "GeneralSetting" => "singleton",
            "EmailSetting" => "singleton",
            "EmailTemplate" => "singleton",
            "ContactInfo" => "singleton",
            "MaintenanceMode" => "singleton",
            "Category" => "singleton",
            "Language" => "singleton",
            "Vendor" => "singleton",
        ];

        foreach ($repositories as $repository => $method) {
            $interface = "App\\Repositories\\Interfaces\\{$repository}RepositoryInterface";
            $implementation = "App\\Repositories\\{$repository}Repository";

            if (interface_exists($interface) && class_exists($implementation)) {
                if ($method === "singleton") {
                    $this->app->singleton($interface, $implementation);
                } elseif ($method === "bind") {
                    $this->app->bind($interface, $implementation);
                } else {
                    throw new \Exception("Invalid method {$method} for repository {$repository}.");
                }
            } else {
                throw new \Exception("Repository or Interface for {$repository} not found.");
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
