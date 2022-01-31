<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Categories;
use App\Orders;
use App\Checkouts;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function login_form()
  {
    return view('admin.login');
  }

  public function adminLogin(Request $request)
  {
    $this->validate($request, [
      'name'   => 'required',
      'password' => 'required',
    ]);

    // get dari model dan menagambil kolom nama, password
    $admin = Admin::where('name', $request->name)
            ->where('password', $request->password)->first();

    //dd($admin);
    if ($admin) {
      session(["login" => $admin->toArray()]);//sessionya yang ada di middleware
      return redirect(route('admin.dashboard')); //views
    }

    else
    {
      return redirect(route('admin'));
    }
  }

  public function admin_dashboard()
  {
    $total = Categories::count('id');
    $totalusers = User::count('id');
    $jm_ch = Checkouts::sum('total');
    $total_ch = Checkouts::count('id');

    return view('admin.dashboard', compact('total', 'totalusers', 'total_ch', 'jm_ch'));
  }

  public function logout(Request $request)
  {
    session(["login" => NULL]);//untuk mengidentifikasi session
    return redirect()->route('admin');
  }

  public function checkout_list()
  {
    $ch_list = Checkouts::latest()->paginate(5)->appends(request()->except('page'));

    return view('admin.checkouts.index', compact('ch_list'));
  }

  public function order_list()
  {
    $od_list = Orders::latest()->paginate(5)->appends(request()->except('page'));

    return view('admin.order.index', compact('od_list'));
  }


}
