<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $fillable = [
      'name', 'price', 'description',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function product()
  {
    return $this->belongsTo('App\Products');
  }

}
