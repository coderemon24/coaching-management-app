<?php

namespace App\Repositories\Interfaces;

interface MaintenanceModeRepositoryInterface
{
    public function getMaintenanceMode();
    public function update($request);
}
