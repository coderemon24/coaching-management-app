<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

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
}
