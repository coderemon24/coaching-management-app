<?php

namespace App\Repositories;

use App\Models\Admin\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;

class LanguageRepository implements LanguageRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        if (class_exists('App\Models\Admin\Language')) {
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

        $getLocal = app()->getLocale();

        $language = $this->model;
        $language->name = $request->name;
        $language->code = strtolower($request->code);
        $language->direction = $request->direction;

        if($getLocal == 'admin_' . $request->code) {
            $language->dashboard_default = 1;
        }

        if($getLocal == $request->code) {
            $language->frontend_default = 1;
        }

        $language->save();

        $default = file_get_contents(resource_path('lang/default.json'));
        $admin_default = file_get_contents(resource_path('lang/admin_default.json'));

        $loc = resource_path('lang/' . $request->code . '.json');
        $admin_loc = resource_path('lang/admin_' . $request->code . '.json');

        file_put_contents($loc, $default);
        file_put_contents($admin_loc, $admin_default);


        return $language;
    }

    public function updateLanguage($request, $id)
    {
        try {
            $language = $this->getLanguageById($id);
            $old_code = $language->code;
            $language->name = $request->name;
            $language->code = strtolower($request->code);
            $language->direction = $request->direction;

            $getLocal = app()->getLocale();

            if($getLocal == 'admin_' . $request->code) {
                $language->dashboard_default = 1;
            }

            if($getLocal == $request->code) {
                $language->frontend_default = 1;
            }

            $content = file_get_contents(resource_path('lang/' . $old_code . '.json'));
            $admin_content = file_get_contents(resource_path('lang/admin_' . $old_code . '.json'));

            $ex_lang = resource_path('lang/' . $old_code . '.json');
            $ex_admin_lang = resource_path('lang/admin_' . $old_code . '.json');

            if(isset($request->code) && file_exists($ex_lang)) {
                unlink($ex_lang);
            }
            if(isset($request->code) && file_exists($ex_admin_lang)) {
                unlink($ex_admin_lang);
            }

            file_put_contents(resource_path('lang/' . $request->code . '.json'), $content);
            file_put_contents(resource_path('lang/admin_' . $request->code . '.json'), $admin_content);

            $language->save();

            return $language;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteLanguage($id)
    {
        $lang = $this->getLanguageById($id);

        $f_file = resource_path('lang/' . $lang->code . '.json');
        $a_file = resource_path('lang/admin_' . $lang->code . '.json');

        unlink($f_file);
        unlink($a_file);

        $lang->delete();

        return;
    }

    public function getDefaultLang($side,$default)
    {
        if($side == 'frontend') {
            $lang = $this->model->where('frontend_default', 1)->first();
        } else {
            $lang = $this->model->where('dashboard_default', 1)->first();
        }
        return $lang;
    }

    public function frontendDefault($id)
    {
        $get_def = $this->getDefaultLang('frontend',1);
        if(isset($get_def)) {
            $get_def->frontend_default = 0;
            $get_def->save();
        }
        $lang = $this->getLanguageById($id);
        $lang->frontend_default = 1;
        $lang->save();

        return;
    }

    public function dashboardDefault($id)
    {
        $get_def = $this->getDefaultLang('dashboard',1);
        if(isset($get_def)) {
            $get_def->dashboard_default = 0;
            $get_def->save();
        }
        $lang = $this->getLanguageById($id);
        $lang->dashboard_default = 1;
        $lang->save();
        return;
    }

    public function frontKeyword($request)
    {
        $lang = $this->getLanguages();

        foreach ($lang as $key => $value) {
            # read file
            $contents = file_get_contents(resource_path('lang/' . $value->code . '.json'));
            if($contents == false) {
                continue;
            }

            # json to associative array
            $contents = json_decode($contents, true);
            if(json_last_error() !== JSON_ERROR_NONE) {
                continue;
            }

            # add keyword to array
            $contents[$request->front_keyword] = $request->front_keyword;

            $file_loc = resource_path('lang/' . $value->code . '.json');
            # convert array to json and put in file
            $createJson = json_encode($contents, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            file_put_contents($file_loc, $createJson);
        }

        # for default file
        $file_path = resource_path('lang/default.json');
        $def_contents = file_get_contents($file_path);

        if($def_contents !== false)
        {
            # json to associative array
            $def_contents = json_decode($def_contents, true);
            # put the content to array
            $def_contents[$request->front_keyword] = $request->front_keyword;
            # generate pretty json and put in file
            $createJson = json_encode($def_contents, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            file_put_contents($file_path, $createJson);
        }

        return;
    }

    public function dashKeyword($request)
    {
        $lang = $this->getLanguages();

        foreach ($lang as $key => $value) {
            # read file
            $contents = file_get_contents(resource_path('lang/admin_' . $value->code . '.json'));
            if($contents == false) {
                continue;
            }

            # json to associative array
            $contents = json_decode($contents, true);
            if(json_last_error() !== JSON_ERROR_NONE) {
                continue;
            }

            # add keyword to array
            $contents[$request->dash_keyword] = $request->dash_keyword;

            $file_loc = resource_path('lang/admin_' . $value->code . '.json');
            # convert array to json and put in file
            $createJson = json_encode($contents, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            file_put_contents($file_loc, $createJson);
        }

        # for default file
        $file_path = resource_path('lang/admin_default.json');
        $def_contents = file_get_contents($file_path);

        if($def_contents !== false)
        {
            # json to associative array
            $def_contents = json_decode($def_contents, true);
            # put the content to array
            $def_contents[$request->dash_keyword] = $request->dash_keyword;
            # generate pretty json and put in file
            $createJson = json_encode($def_contents, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            file_put_contents($file_path, $createJson);
        }

        return;
    }

    public function getFrontendKeyword($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getDashboardKeyword($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateFrontendKeyword($request, $id)
    {
        $get_data = $request['key_values'];

        foreach($get_data as $key => $value) {
            if($value === null || $value === '') {
                return $key;
            }
        }

        $lang = $this->getLanguageById($id);

        $path = resource_path('lang/' . $lang->code . '.json');
        $jsonData = json_encode($get_data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        file_put_contents($path, $jsonData);

        return false;
    }

    public function updateDashboardKeyword($request, $id)
    {
        $get_data = $request['keyvalues'];

        if(!is_array($get_data)) {
            return "Invalid Key Values Data.";
        }

        foreach($get_data as $key => $value) {
            if($value === null || $value === '') {
                return $key;
            }
        }

        $lang = $this->getLanguageById($id);

        $path = resource_path('lang/admin_' . $lang->code . '.json');
        $jsonData = json_encode($get_data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        file_put_contents($path, $jsonData);

        return false;
    }
}
