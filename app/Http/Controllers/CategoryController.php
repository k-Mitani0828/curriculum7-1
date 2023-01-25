<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;

class Controller extends BaseController
{   
    public function index(Category $category)
{
    return view('categories.index')->with(['posts' => $category->getByCategory()]);
}
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
