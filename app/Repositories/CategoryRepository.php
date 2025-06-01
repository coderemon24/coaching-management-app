<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;
    public function __construct()
    {
        if(class_exists('App\Models\Admin\Category'))
        {
            $this->model = new \App\Models\Admin\Category();
        }
    }

    public function getCategories()
    {
        return $this->model->all();
    }

    public function getCategoryById($id)
    {
        return $this->model->find($id);
    }

    public function createCategory(array $data)
    {
        return $this->model->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function deleteCategory($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
