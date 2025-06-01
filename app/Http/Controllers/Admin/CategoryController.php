<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
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
}
