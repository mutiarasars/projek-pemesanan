<?php

namespace App\Http\Controllers;

use App\User;
use App\Categories;
use App\Orders;
use App\Checkouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function user_pesan(Categories $categories)
  {
    $category = Categories::all();
    return view('user.pesan', compact('categories', 'category'));
  }

  public function beli(Categories $categories)
  {
    $category = Categories::all();
    return view('buy', compact('categories', 'category'));
  }

  public function beli_send(Request $request)
  {
    $validatedData = $request->validate
    ([
      'no_telpon' => 'required',
      'alamat' => 'required',
      'description' => 'required',
      'total' => 'required|numeric',
    ]);

    $kode_unik = rand();
    $category = Categories::all();
    $photo = $request->file('photo');
    $file = time()."_".$photo->getClientOriginalName();

    $upload = 'images/products/sample';
    $photo->move($upload, $file);

    Orders::create([
      'nama_user' => Auth::user()->name,
      'user_id' => Auth::user()->id,
      'no_telpon' => $request->no_telpon,
      'alamat' => $request->alamat,
      'ukuran' => $request->ukuran,
      'category_id' => $request->category_id,
      'qty' => $request->qty ?? 24,
      'name_product' => $request->name_product,
      'photo' => $file,
      'description' => $request->description,
      'warna' => $request->warna,
      'uk_panjang' => $request->uk_panjang,
      'uk_lingkar' => $request->uk_lingkar,
      'uk_pinggang' => $request->uk_pinggang,
      'uk_lengan' => $request->uk_lengan,
      'uk_pundak' => $request->uk_pundak,
      'total' => $request->total,
  	]);

    Checkouts::firstOrCreate([
      'kode_unik' => $kode_unik,
      'nama_user' => Auth::user()->name,
      'user_id' => Auth::user()->id,
      'no_telpon' => $request->no_telpon,
      'alamat' => $request->alamat,
      'ukuran' => $request->ukuran,
      'category_id' => $request->category_id,
      'qty' => $request->qty ?? 24,
      'name_product' => $request->name_product,
      'photo' => $file,
      'description' => $request->description,
      'warna' => $request->warna,
      'uk_panjang' => $request->uk_panjang,
      'uk_lingkar' => $request->uk_lingkar,
      'uk_pinggang' => $request->uk_pinggang,
      'uk_lengan' => $request->uk_lengan,
      'uk_pundak' => $request->uk_pundak,
      'total' => $request->total,
  	]);
    //dd($request);
    return back()->with('ok', 'Succses!');
  }

  public function order()
  {
    $id = Auth::user()->id;
    $total_order = Orders::where('user_id', $id)->latest()->paginate(5);

    return view('user.order', compact('total_order'));
  }

  public function edit_order(Request $request, Orders $order)
  {
    $id = Auth::user()->id;
		if($order->user_id !== $id)
    {
			return abort(404);
		}

		$user = User::find($id);
		$total_order = Orders::where('user_id', $id)->get();
    $category = Categories::all();

    return view('user.editorder', compact('total_order', 'order', 'category'));
  }

  public function update_order(Request $request, $id)
  {
    $validatedData = $request->validate
    ([
      'no_telpon' => 'required',
      'alamat' => 'required',
      'description' => 'required',
    ]);

    $kode_unik = rand();
    $category = Categories::all();
    $photo = $request->file('photo');
    $file = time()."_".$photo->getClientOriginalName();

    $upload = 'images/products/sample';
    $photo->move($upload, $file);

    Orders::where('id', $id)->update([
      'nama_user' => Auth::user()->name,
      'user_id' => Auth::user()->id,
      'no_telpon' => $request->no_telpon,
      'alamat' => $request->alamat,
      'ukuran' => $request->ukuran,
      'category_id' => $request->category_id,
      'qty' => $request->qty,
      'name_product' => $request->name_product,
      'photo' => $file,
      'description' => $request->description,
      'warna' => $request->warna,
      'uk_panjang' => $request->uk_panjang,
      'uk_lingkar' => $request->uk_lingkar,
      'uk_pinggang' => $request->uk_pinggang,
      'uk_lengan' => $request->uk_lengan,
      'uk_pundak' => $request->uk_pundak,
      'total' => $request->total,
  	]);

    Checkouts::where('id', $id)->update([
      'kode_unik' => $kode_unik,
      'nama_user' => Auth::user()->name,
      'user_id' => Auth::user()->id,
      'no_telpon' => $request->no_telpon,
      'alamat' => $request->alamat,
      'ukuran' => $request->ukuran,
      'category_id' => $request->category_id,
      'qty' => $request->qty,
      'name_product' => $request->name_product,
      'photo' => $file,
      'description' => $request->description,
      'warna' => $request->warna,
      'uk_panjang' => $request->uk_panjang,
      'uk_lingkar' => $request->uk_lingkar,
      'uk_pinggang' => $request->uk_pinggang,
      'uk_lengan' => $request->uk_lengan,
      'uk_pundak' => $request->uk_pundak,
      'total' => $request->total,
  	]);
    //dd($request);
    return back()->with('ok', 'Succses edited!');
  }

  public function ambil_produk()
  {
    $id = Auth::user()->id;
    $total_checkout = Checkouts::where('user_id', $id)->latest()->paginate(5);

    return view('user.pay', compact('total_checkout'));
  }

}
