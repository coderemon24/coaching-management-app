<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactInfoRequest;
use App\Http\Requests\EmailSettingRequest;
use App\Http\Requests\EmailTemplateRequest;
use App\Http\Requests\GeneralSettingRequest;
use App\Models\Settings\GeneralSetting;
use App\Repositories\Interfaces\ContactInfoRepositoryInterface;
use App\Repositories\Interfaces\EmailSettingRepositoryInterface;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use App\Repositories\Interfaces\GeneralSettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    protected $generalSetting;
    protected $emailSetting;
    protected $emailTemplate;
    protected $contactInfo;

    public function __construct(
        GeneralSettingRepositoryInterface $generalSettingRepository,
        EmailSettingRepositoryInterface $emailSettingRepository,
        EmailTemplateRepositoryInterface $emailTemplateRepository,
        ContactInfoRepositoryInterface $contactInfoRepository
    ){
        $this->generalSetting = $generalSettingRepository;
        $this->emailSetting = $emailSettingRepository;
        $this->emailTemplate = $emailTemplateRepository;
        $this->contactInfo = $contactInfoRepository;
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

    public function editEmailTemplate($id)
    {
        $data['template'] = $this->emailTemplate->getTemplateById($id);
        return view('backend.settings.edit-email-template', $data);
    }

    public function updateEmailTemplate(EmailTemplateRequest $request)
    {
        $request->validated();
        $template = $this->emailTemplate->updateTemplate($request->id, $request->all());
        if (!$template) {
            return redirect()->back()->with('error', 'Failed to update email template.');
        }
        return redirect()->route('admin.email.templates')->with('success', 'Email template updated successfully.');
    }

    public function showContactInfos()
    {
        $data['contactInfo'] = $this->contactInfo->getFirst();
        return view('backend.settings.contact-info', $data);
    }

    public function updateContactInfo(ContactInfoRequest $request)
    {
        $request->validated();
        $contactInfo = $this->contactInfo->update($request);
        if (!$contactInfo) {
            return redirect()->back()->with('error', 'Failed to update contact info.');
        }
        return redirect()->back()->with('success', 'Contact info updated successfully.');
    }

    public function showMaintenanceMode()
    {
        return view('backend.settings.maintenance-mode');
    }
}
