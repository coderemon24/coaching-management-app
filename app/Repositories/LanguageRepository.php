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
        return $this->model->findOrFail($id);
    }

    public function createLanguage($request)
    {
        $language = $this->model;
        $language->name = $request->name;
        $language->code = strtolower($request->code);
        $language->direction = $request->direction;
        $language->save();

        return $language;
    }

    public function updateLanguage($id, $request)
    {

    }

    public function deleteLanguage($id)
    {

    }
}
