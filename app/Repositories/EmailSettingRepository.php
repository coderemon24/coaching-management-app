<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EmailSettingRepositoryInterface;

class EmailSettingRepository implements EmailSettingRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        if(class_exists('App\Models\Settings\EmailSetting')) {
            $this->model = new \App\Models\Settings\EmailSetting;
        } else {
            throw new \Exception('EmailSetting model does not exist.');
        }
    }

    public function getFirst()
    {
        return $this->model->first();
    }

    public function update($request)
    {
        $emailSetting = $this->getFirst();

        if (!$emailSetting) {
            $emailSetting = new $this->model;
        }

        $emailSetting->mail_driver = $request->mail_driver;
        $emailSetting->mail_host = $request->mail_host;
        $emailSetting->mail_port = $request->mail_port;
        $emailSetting->mail_username = $request->mail_username;
        $emailSetting->mail_password = base64_encode($request->mail_password);
        $emailSetting->mail_encryption = $request->mail_encryption;
        $emailSetting->mail_from_address = $request->mail_from_address;
        $emailSetting->mail_from_name = $request->mail_from_name;

        return $emailSetting->save();
    }
}
