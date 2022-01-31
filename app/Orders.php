<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  protected $fillable = [
      'nama_user', 'user_id', 'no_telpon', 'alamat', 'ukuran', 'category_id', 'qty',
      'name_product', 'photo', 'description', 'warna', 'uk_panjang', 'uk_lingkar',
      'uk_pinggang', 'uk_lengan', 'uk_pundak', 'total',

  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function categories()
  {
    return $this->belongsTo('App\Categories', 'category_id');
  }

}
