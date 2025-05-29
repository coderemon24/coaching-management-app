<?php

namespace App\Repositories\Interfaces;

interface EmailTemplateRepositoryInterface
{
    public function getAllTemplates();
    public function getTemplateById($id);
    public function updateTemplate($id, array $data);
    public function getTemplateByType($type);
}
