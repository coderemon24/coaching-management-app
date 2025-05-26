<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSettings()
    {
        return view('backend.settings.setting');
    }

    public function showGeneralSettings()
    {
        return view('backend.settings.general-setting');
    }

    public function updateGeneralSettings()
    {
        
    }
}
