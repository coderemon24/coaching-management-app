<?php

namespace App\Repositories\Interfaces;

interface EmailSettingRepositoryInterface
{
    public function getFirst();
    public function update($request);
}
