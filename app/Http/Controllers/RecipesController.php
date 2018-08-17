<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('admin', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipes.index')->with('recipes', Recipe::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:191',
            'img' => 'required|image',
            'about' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required'
        ]);

        if($request->hasFile('img')) {
            $originalImgName = $request->file('img')->getClientOriginalName();
            $newImgName = time() . $originalImgName;
            $request->file('img')->storeAs('public/recipes_images', $newImgName);
        }


        Recipe::create([
            'user_id' => \Auth::id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'img' => $newImgName,
            'about' => $request->about,
            'ingredients' => $request->ingredients,
            'preparation' => $request->preparation,
            'slug' => str_slug($request->name)
        ]);

        Session::flash('success', 'Recipe Created Successfully');
        return redirect()->route('recipes.show', ['recipe' => str_slug($request->name)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->first();

        $prevRecipeId = Recipe::where('id', '<', $recipe->id)->max('id');
        $nextRecipeId = Recipe::where('id', '>', $recipe->id)->min('id');

        $prevRecipe = Recipe::where('id', $prevRecipeId)->first();
        $nextRecipe = Recipe::where('id', $nextRecipeId)->first();
        return view('recipes.show')
            ->with('recipe', $recipe)
            ->with('prevRecipe', $prevRecipe)
            ->with('nextRecipe', $nextRecipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $recipe = Recipe::where('slug', $slug)->first();
        return view('recipes.edit')
            ->with('recipe', $recipe)
            ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:191',
            'img' => 'nullable|image',
            'about' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required'
        ]);

        if($request->hasFile('img')) {
            $originalImgName = $request->file('img')->getClientOriginalName();
            $newImgName = time() . $originalImgName;

            if ($recipe->img) {
                \Storage::delete('public/recipes_images/'. $recipe->img);
            }
            $request->file('img')->storeAs('public/recipes_images', $newImgName);

            $recipe->img = $newImgName;
        }

        $recipe->category_id = $request->category_id;
        $recipe->name = $request->name;
        $recipe->about = $request->about;
        $recipe->ingredients = $request->ingredients;
        $recipe->preparation = $request->preparation;
        $recipe->slug = str_slug($request->name);
        $recipe->save();

        Session::flash('success', 'Recipe Updated Successfully');
        return redirect()->route('myRecipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->img) {
            \Storage::delete('public/recipes_images/'. $recipe->img);
        }
        $recipe->forceDelete();

        Session::flash('success', 'Recipe Deleted Successfully');
        return redirect()->back();
    }

    public function trashed() {
        return view('recipes.trashed')->with('trashedRecipes', Recipe::onlyTrashed()->get());
    }


}
