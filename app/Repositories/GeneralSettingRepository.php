<?php

namespace App\Repositories;

use App\Models\Settings\GeneralSetting;
use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;

class GeneralSettingRepository implements GeneralSettingRepositoryInterface
{
    public function getFirst()
    {
        return GeneralSetting::first();
    }
    public function update($request)
    {
        $generalSetting = $this->getFirst();

        if (!$generalSetting) {
            $generalSetting = new GeneralSetting();
        }

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(10,99). '.'.$extension;
            $path = 'assets/images/logos/';
            $file->move($path, $fileName);
            $generalSetting->site_logo = $path . $fileName;
        }
        if ($request->hasFile('site_favicon')) {
            $file = $request->file('site_favicon');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(10,99). '.'.$extension;
            $path = 'assets/images/logos/';
            $file->move($path, $fileName);
            $generalSetting->site_favicon = $path . $fileName;
        }

        $generalSetting->site_name = $request->site_name;
        $generalSetting->site_title = $request->site_title;
        $generalSetting->timezone = $request->timezone;
        $generalSetting->currency_symbol = $request->currency;
        $generalSetting->currency_position = $request->currency_position;
        $generalSetting->currency_text = $request->currency_text;
        $generalSetting->currency_text_position = $request->currency_text_position;
        $generalSetting->currency_rate = $request->currency_rate;
        $generalSetting->site_color = $request->site_color;
        $generalSetting->updated_by = auth('admin')->id();

        return $generalSetting->save();
    }
}
