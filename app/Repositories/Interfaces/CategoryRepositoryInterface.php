<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getCategories();
    public function getCategoryById($id);
    public function createCategory($request);
    public function updateCategory($id, $request);
    public function deleteCategory($id);
}
