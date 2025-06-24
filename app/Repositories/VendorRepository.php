<?php

namespace App\Repositories;

use App\Models\Admin\Vendors\Vendor;
use App\Repositories\Interfaces\VendorRepositoryInterface;

class VendorRepository implements VendorRepositoryInterface
{
    public $model;
    public function __construct(Vendor $vendor)
    {
        $this->model = $vendor;
    }

    public function getVendors()
    {
        return $this->model->all();
    }
}
