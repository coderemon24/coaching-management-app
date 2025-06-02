<?php

namespace App\Repositories\Interfaces;

interface LanguageRepositoryInterface
{
    public function getLanguages();
    public function getLanguageById($id);
    public function createLanguage($request);
    public function updateLanguage($id, $request);
    public function deleteLanguage($id);
}
