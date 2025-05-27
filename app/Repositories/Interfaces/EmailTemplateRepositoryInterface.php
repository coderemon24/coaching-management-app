<?php

namespace App\Repositories\Interfaces;

interface EmailTemplateRepositoryInterface
{
    public function getAllTemplates();
    public function getTemplateById($id);
    public function createTemplate(array $data);
    public function updateTemplate($id, array $data);
    public function deleteTemplate($id);
    public function getTemplateByType($type);
}
