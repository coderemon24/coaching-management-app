<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageCreateRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $language;

    public function __construct(LanguageRepositoryInterface $language)
    {
        $this->language = $language;
    }

    public function index()
    {
        $data['languages'] = $this->language->getLanguages();
        return view('backend.languages.index', $data);
    }

    public function store(LanguageCreateRequest $request)
    {
        $request->validated();

        $this->language->createLanguage($request);
        session()->flash('success', 'Language created successfully.');

        return back();
    }

    public function destroy($id)
    {
        $this->language->deleteLanguage($id);

        session()->flash('success', 'Language deleted successfully.');

        return back();
    }

    public function edit($id)
    {
        $data['lang'] = $this->language->getLanguageById($id);
        return view('backend.languages.edit', $data);
    }

    public function update(LanguageUpdateRequest $request, $id)
    {
        $request->validated();

        $update = $this->language->updateLanguage($request, $id);

        if ($update) {
            session()->flash('success', 'Language updated successfully.');
        }
        return redirect()->route('admin.languages');
    }

    public function frontDefault($id)
    {
        $this->language->frontendDefault($id);
        session()->flash('success', 'Frontend default language updated successfully.');
        return back();
    }

    public function dashDefault($id)
    {
        $this->language->dashboardDefault($id);
        session()->flash('success', 'Dashboard default language updated successfully.');
        return back();
    }

    public function addFrontendKeyword(Request $request)
    {
        $request->validate([
            'front_keyword' => 'required'
        ]);

        $this->language->frontKeyword($request);
        session()->flash('success', 'Frontend keyword added successfully.');
        return back();
    }

    public function addDashboardKeyword(Request $request)
    {
        $request->validate([
            'dash_keyword' => 'required'
        ]);

        $this->language->dashKeyword($request);
        session()->flash('success', 'Dashboard keyword added successfully.');
        return back();
    }

    public function editFrontendKeyword($id)
    {
        $lang = $this->language->getFrontendKeyword($id);
        $file_path = resource_path('lang/' . $lang->code . '.json');
        $get_data = file_get_contents($file_path);

        $data['language'] = $lang;
        $data['keywords'] = json_decode($get_data, true);

        return view('backend.languages.edit-frontend-keyword', $data);
    }

    public function editDashboardKeyword($id)
    {
        $lang = $this->language->getDashboardKeyword($id);
        $file_path = resource_path('lang/admin_' . $lang->code . '.json');
        $get_data = file_get_contents($file_path);

        $data['language'] = $lang;
        $data['keywords'] = json_decode($get_data, true);

        return view('backend.languages.edit-dashboard-keyword', $data);
    }

    public function updateFrontendKeyword(Request $request, $id)
    {
        $keywords = $this->language->updateFrontendKeyword($request, $id);

        if($keywords == ) {
            session()->flash('warning', 'Value is required for ' . $keywords . ' keyword.');
            return back();
        }

        session()->flash('success', 'Frontend keyword for ' . $request->dashboard_keyword . ' language updated successfully.');
        return back();
    }

    public function updateDashboardKeyword(Request $request, $id)
    {
        $keywords = $this->language->updateDashboardKeyword($request, $id);

        if($keywords) {
            session()->flash('warning', 'Value is required for ' . $keywords . ' keyword.');
            return back();
        }

        session()->flash('success', 'Dashboard keyword for ' . $request->dashboard_keyword . ' language updated successfully.');
        return back();
    }
}
