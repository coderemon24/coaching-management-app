<?php

namespace App\Repositories\Interfaces;

interface LanguageRepositoryInterface
{
    public function getLanguages();
    public function getLanguageById($id);
    public function createLanguage($request);
    public function updateLanguage($id, $request);
    public function deleteLanguage($id);
    public function frontendDefault($id);
    public function dashboardDefault($id);
    public function getDefaultLang($side,$default);
    public function frontKeyword($request);
    public function dashKeyword($request);
    public function getFrontendKeyword($id);
    public function getDashboardKeyword($id);
}
