<?php

namespace App\Repositories;

use App\Helpers\ImageUpload;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;
    protected $languages;

    public function __construct()
    {
        if (class_exists('App\Models\Admin\Category')) {
            $this->model = new \App\Models\Admin\Category();
        }

        $this->languages = app('languages');
    }

    public function getCategories()
    {
        $data = $this->model->select(
            'id',
            'cat_name',
            'slug',
            'cat_image',
            'cat_status',
            'is_featured',
            'cat_order'
        )
            ->orderBy('cat_order', 'asc')
            ->get();
        return $data;
    }

    public function getCategoryById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createCategory($request)
    {
        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $uploadedFile = $request->file('image');
            $imagePath = ImageUpload::upload('uploads/categories', $uploadedFile);
        } else {
            $imagePath = 'test.webp'; // fallback
        }


        $uid = uniqid();

        foreach ($this->languages as $key => $lang) {

            $name = $request[$lang->code . '_name'] ?? null;
            if (!$name) continue;
            $category = new ($this->model);
            $category->language_id = $lang->id;
            $category->unique_id = $uid;
            $category->cat_name = $name;
            $category->slug = slugify($name);
            $category->cat_image = $imagePath;
            $category->cat_status = $request->cat_status;
            $category->cat_order = $request->cat_order;
            $category->save();
        }

        return;
    }


    public function updateCategory($id, $request)
    {
        $category = $this->getCategoryById($id);
        $category->cat_name = $request->cat_name;
        $category->slug = slugify($request->cat_name);

        if ($request->hasFile('image')) {
            if ($category->cat_image && file_exists($category->cat_image)) {
                ImageUpload::delete($category->cat_image);
            }

            $image = ImageUpload::upload('uploads/categories', $request->file('image'));
            $category->cat_image = $image;
        }

        $category->cat_status = $request->cat_status;
        $category->is_featured = $request->is_featured;
        $category->cat_order = $request->cat_order;
        $category->save();

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCategoryById($id);
        if ($category->cat_image && file_exists($category->cat_image)) {
            ImageUpload::delete($category->cat_image);
        }
        $category->delete();
    }

    public function statusUpdate($id)
    {
        $category = $this->getCategoryById($id);
        if ($category->cat_status == 'active') {
            $category->cat_status = 'inactive';
        } else {
            $category->cat_status = 'active';
        }
        $category->save();
        return $category;
    }

    public function featuredUpdate($id)
    {
        $category = $this->getCategoryById($id);
        if ($category->is_featured == 'active') {
            $category->is_featured = 'inactive';
        } else {
            $category->is_featured = 'active';
        }
        $category->save();
        return $category;
    }
}
