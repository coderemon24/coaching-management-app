<?php

namespace  App\Repositories;

use App\Repositories\Interfaces\ContactInfoRepositoryInterface;

class ContactInfoRepository implements ContactInfoRepositoryInterface
{
    public $model;

    public function __construct()
    {
        if (class_exists('App\Models\Admin\ContactInfo')) {
            $this->model = new \App\Models\Admin\ContactInfo;
        } else {
            throw new \Exception('ContactInfo model does not exist.');
        }
    }

    public function getFirst()
    {
        return $this->model->first();
    }

    public function update($request)
    {
        $contactInfo = $this->getFirst();

        if (!$contactInfo) {
            $contactInfo = new $this->model;
        }

        $contactInfo->address = $request->address;
        $contactInfo->email = $request->email;
        $contactInfo->phone = $request->phone;
        $contactInfo->map = $request->map;
        $contactInfo->save();

        return $contactInfo;
    }
}
