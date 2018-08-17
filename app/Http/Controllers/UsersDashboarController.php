<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersDashboarController extends Controller
{
    public function myRecipes()
    {
        $userRecipes = \Auth::user()->recipes;

        return view('admin.users.myrecipes')->with('recipes', $userRecipes);
    }

    public function profile()
    {
        return view('admin.users.profile');
    }

//    Admin

    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalRecipes' => count(Recipe::all()),
            'totalUsers' => count(User::all()),
            'totalCategories' => count(Category::all())
        ]);
    }

    public function users()
    {
        return view('admin.allUsers')->with('users', User::all());
    }

    public function destroyUser($id)
    {
        User::where('id', $id)->first()->delete();

        Session::flash('success', 'User Deleted Successfully');
        return redirect()->back();
    }
}
