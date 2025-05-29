<?php

namespace App\Repositories\Interfaces;

interface ContactInfoRepositoryInterface
{
    public function getFirst();
    public function update($request);
}
