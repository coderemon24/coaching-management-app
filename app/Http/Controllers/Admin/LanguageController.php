<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageCreateRequest;
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
}
