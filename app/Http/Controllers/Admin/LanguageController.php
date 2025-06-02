<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
