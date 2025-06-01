<?php

namespace App\Repositories;

use App\Helpers\ImageUpload;
use App\Repositories\Interfaces\MaintenanceModeRepositoryInterface;
use Illuminate\Support\Facades\Artisan;

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
        if(!$this->model->first()) {
            $maintenance = $this->model;
        } else {
            $maintenance = $this->getMaintenanceMode();
        }

        $maintenance->status = $request->status;
        $maintenance->message = $request->maintenance_message;
        $maintenance->bypass_token = $request->bypass_token;

        if($request->hasFile('image'))
        {
            if($maintenance->image && file_exists(public_path($maintenance->image))) {
                ImageUpload::delete($maintenance->image);
            }
            $image = ImageUpload::upload('uploads/maintenance', $request->file('image'));
            if($image) {
                $maintenance->image = $image;
            }
        }

        if($request->status == 'activated' && $request->bypass_token != null)
        {
            Artisan::call('down',[
                '--secret' => $request->bypass_token
            ]);
            Artisan::call('optimize:clear');
        }

        if($request->status == 'deactivated')
        {
            Artisan::call('up');
            Artisan::call('optimize:clear');
        }

        $maintenance->save();
        return $maintenance;
    }

}
