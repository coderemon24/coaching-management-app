<?php

namespace App\Repositories;

use App\Models\Admin\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;

class LanguageRepository implements LanguageRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        if(class_exists('App\Models\Admin\Language'))
        {
            $this->model = new Language();
        }
    }

    public function getLanguages()
    {
        return $this->model->get();
    }

    public function getLanguageById($id)
    {

    }

    public function createLanguage($request)
    {

    }

    public function updateLanguage($id, $request)
    {

    }

    public function deleteLanguage($id)
    {

    }
}
