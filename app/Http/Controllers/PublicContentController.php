<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicContentController extends Controller
{
    public function index() {
        return view('public.index');
    }
}
