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

        $default = file_get_contents(resource_path('lang/default.json'));
        $admin_default = file_get_contents(resource_path('lang/admin_default.json'));

        $loc = resource_path('lang/'.$request->code.'.json');
        $admin_loc = resource_path('lang/admin_'.$request->code.'.json');

        file_put_contents($loc, $default);
        file_put_contents($admin_loc, $admin_default);

        return $language;
    }

    public function updateLanguage($id, $request)
    {

    }

    public function deleteLanguage($id)
    {
        $lang = $this->getLanguageById($id);

        $f_file = resource_path('lang/'.$lang->code.'.json');
        $a_file = resource_path('lang/admin_'.$lang->code.'.json');

        unlink($f_file);
        unlink($a_file);

        $lang->delete();

        return;

    }
}
