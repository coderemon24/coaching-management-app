<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettingRequest;
use App\Models\Settings\GeneralSetting;
use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    protected $generalSetting;

    public function __construct(
        GeneralSettingRepositoryInterface $generalSettingRepository
    ){
        $this->generalSetting = $generalSettingRepository;
    }

    public function showSettings()
    {
        return view('backend.settings.setting');
    }

    public function showGeneralSettings()
    {
        $data['generalSetting'] = $this->generalSetting->getFirst();
        return view('backend.settings.general-setting', $data);
    }

    public function updateGeneralSettings(GeneralSettingRequest $request)
    {
        $request->validated();

        $generalSetting = $this->generalSetting->update($request);

        if (!$generalSetting) {
            return redirect()->back()->with('error', 'Failed to update general settings.');
        }

        return redirect()->back()->with('success', 'General settings updated successfully.');
    }
}
