<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'customer_id', 'customer_email', 'product_id',
  ];
}
