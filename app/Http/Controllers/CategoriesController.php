<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);

        Session::flash('success', 'Category Created Successfully');
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|max:191'
        ]);

        Category::update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);

        Session::flash('success', 'Category Updated Successfully');
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        foreach ($category->recipes as $recipe) {
            $recipe->delete();
        }
        $category->delete();

        Session::flash('success', 'Category Trashed Successfully');
        return redirect()->route('categories.index');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->restore();

        $recipes = Recipe::withTrashed()->where('category_id', $id)->get();
        foreach ($recipes as $recipe) {
            $recipe->restore();
        }

        Session::flash('success', 'Category Restored Successfully');
        return redirect()->route('categories.index');
    }

    public function destroyPermentaly($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();

        $recipes = Recipe::withTrashed()->where('category_id', $id)->get();
        foreach ($recipes as $recipe) {
            $recipe->forceDelete();
        }

        $category->forceDelete();

        Session::flash('success', 'Category Deleted Permentaly Successfully');
        return redirect()->route('categories.index');
    }

    public function trashed()
    {
        return view('categories.trashed')->with('trashedCategories', Category::onlyTrashed()->get());
    }
}
