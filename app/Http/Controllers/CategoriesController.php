<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Categories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function category()
  {
    $categories = Categories::latest()->paginate(5)->appends(request()->except('page'));
    return view('admin.categories.index', compact('categories'));
  }

  public function insert_form()
  {
    return view('admin.categories.add');
  }

  public function insert_cat(Request $request)
  {
    $validatedData = $request->validate
    ([
      'name' => 'required|max:55',
      'price' => 'required|numeric',
      'description' => 'required',
    ]);

    $name = $request->name;
    $price = $request->price;
    $description = $request->description;

    Categories::create
    ([
      'name' => $name,
      'price' => $price,
      'description' => $description,
    ]);

    return back()->with('ok', 'Uploaded!');
  }

  public function edit_cat_form($id)
  {
    $categories = Categories::find($id);

    return view('admin.categories.edit', compact('categories'));
  }

  public function update(Request $request, $id)
  {
    //dd(1);
    $validatedData = $request->validate
    ([
      'name' => 'required|max:55',
      'price' => 'required|numeric',
      'description' => 'required',
		]);

		$categories = Categories::find($id);

    $name = $request->name;
    $price = $request->price;
    $description = $request->description;

		$categories->update([
      'name' => $name,
      'price' => $price,
      'description' => $description,
		]);

		return redirect()->route('admin.categories')->with('ok', 'edited!');
  }

  public function delete($id)
  {
    $categories = Categories::find($id);
		$categories->delete();

		return redirect()->back()->with('ok', 'deleted!');
  }
}
