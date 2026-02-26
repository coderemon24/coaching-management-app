<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;

class EmailTemplateRepository implements EmailTemplateRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        if (class_exists('App\Models\Settings\EmailTemplate')) {
            $this->model = new \App\Models\Settings\EmailTemplate;
        } else {
            throw new \Exception('EmailTemplate model does not exist.');
        }
    }

    public function getAllTemplates()
    {
        return $this->model->all();
    }

    public function getTemplateById($id)
    {
        return $this->model->find($id);
    }

    public function updateTemplate($id, array $data)
    {
        $template = $this->getTemplateById($id);
        if ($template) {
            return $template->update($data);
        }
        return false;
    }

    public function getTemplateByType($type)
    {
        return $this->model->where('type', $type)->firstOrFail();
    }
}
