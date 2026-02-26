<?php

namespace App\Repositories;

use App\Helpers\ImageUpload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use App\Repositories\Interfaces\MaintenanceModeRepositoryInterface;

class MaintenanceModeRepository implements MaintenanceModeRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        if (class_exists('App\Models\Admin\MaintenanceMode')) {
            $this->model = new \App\Models\Admin\MaintenanceMode;
        } else {
            throw new \Exception('MaintenanceMode model does not exist.');
        }
    }

    public function getMaintenanceMode()
    {
        return $this->model->first();
    }

    public function update($request)
    {
        $maintenance = $this->getMaintenanceMode() ?? $this->model;

        // Update main fields
        $maintenance->status = $request->status;
        $maintenance->message = $request->maintenance_message;

        // Only set new bypass token if user sent it
        if ($request->filled('bypass_token')) {
            $maintenance->bypass_token = $request->bypass_token;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($maintenance->image && file_exists(public_path($maintenance->image))) {
                ImageUpload::delete($maintenance->image);
            }

            $image = ImageUpload::upload('uploads/maintenance', $request->file('image'));
            if ($image) {
                $maintenance->image = $image;
            }
        }

        // Save before calling Artisan so token is persisted
        $maintenance->save();

        // Maintenance mode handling
        if ($request->status === 'activated') {
            $secret = $maintenance->bypass_token;
            Artisan::call('down', ['--secret' => $secret]);
            Artisan::call('optimize:clear');
            Log::info('Site is in maintenance mode with secret: ' . $secret);
        } elseif ($request->status === 'deactivated') {
            Artisan::call('up');
            Artisan::call('optimize:clear');
            Log::info('Site is live now');
        }

        return $maintenance;
    }


}
