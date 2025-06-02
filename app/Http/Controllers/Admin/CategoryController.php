<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
class CategoryController extends Controller
{
    protected $category;

    public function __construct(
        CategoryRepositoryInterface $category
    )
    {
        $this->category = $category;
    }

    public function index()
    {
        $data['categories'] = $this->category->getCategories();
        return view('backend.categories.index', $data);
    }

    public function store(CategoryStoreRequest $request)
    {
        $request->validated();
        $this->category->createCategory($request);

        $request->session()->flash('success', 'Category created successfully.');

        return back();
    }

    public function edit($id)
    {
        $data['category'] = $this->category->getCategoryById($id);
        return view('backend.categories.edit', $data);
    }

    public function update($id, CategoryUpdateRequest $request)
    {
        $request->validated();
        $this->category->updateCategory($id, $request);

        $request->session()->flash('success', 'Category updated successfully.');

        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $this->category->deleteCategory($id);

        session()->flash('success', 'Category deleted successfully.');
        return back();
    }
}
