<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSettingRequest;
use App\Http\Requests\GeneralSettingRequest;
use App\Models\Settings\GeneralSetting;
use App\Repositories\Interfaces\EmailSettingRepositoryInterface;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    protected $generalSetting;
    protected $emailSetting;
    protected $emailTemplate;

    public function __construct(
        GeneralSettingRepositoryInterface $generalSettingRepository,
        EmailSettingRepositoryInterface $emailSettingRepository,
        EmailTemplateRepositoryInterface $emailTemplateRepository
    ){
        $this->generalSetting = $generalSettingRepository;
        $this->emailSetting = $emailSettingRepository;
        $this->emailTemplate = $emailTemplateRepository;
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

    public function showEmailSettings()
    {
        $data['emailSetting'] = $this->emailSetting->getFirst();
        return view('backend.settings.email-setting', $data);
    }

    public function updateEmailSettings(EmailSettingRequest $request)
    {
        $request->validated();
        $emailSetting = $this->emailSetting->update($request);
        if (!$emailSetting) {
            return redirect()->back()->with('error', 'Failed to update email settings.');
        }
        return redirect()->back()->with('success', 'Email settings updated successfully.');
    }

    public function showEmailTemplates()
    {
        $data['emailTemplates'] = $this->emailTemplate->getAllTemplates();
        return view('backend.settings.email-templates', $data);
    }
}
