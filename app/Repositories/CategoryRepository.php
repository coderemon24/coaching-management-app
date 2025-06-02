<?php

namespace App\Repositories;

use App\Helpers\ImageUpload;
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
        $data = $this->model->select('id', 'cat_name', 'slug', 'cat_image', 'cat_status','is_featured','cat_order')->get();
        return $data;
    }

    public function getCategoryById($id)
    {
        return $this->model->find($id);
    }

    public function createCategory($request)
    {
        $category = new $this->model;
        $category->cat_name = $request->cat_name;
        $category->slug = slugify($request->cat_name);
        $image = ImageUpload::upload('uploads/categories', $request->file('image'));
        $category->cat_image = $image;
        $category->cat_status = $request->cat_status;
        $category->cat_order = $request->cat_order;
        $category->save();

        return $category;
    }

    public function updateCategory($id, $request)
    {
        return $this->model->where('id', $id)->update($request->all());
    }

    public function deleteCategory($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
