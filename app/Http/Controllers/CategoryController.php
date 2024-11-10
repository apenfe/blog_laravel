<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('posts.create')->with('success', 'Categoría creada correctamente.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
