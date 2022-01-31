<?php

namespace App\Http\Controllers;

use App\User;
use App\Categories;

use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function index()
  {
    $category = Categories::all();

    return view('index', compact('category'));
  }
}
