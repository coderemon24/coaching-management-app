<?php

namespace App\Repositories\Interfaces;

interface GeneralSettingRepositoryInterface
{
    public function getFirst();
    public function update($id, array $data);
}
