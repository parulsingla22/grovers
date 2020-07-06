<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    protected $table="order_items";
	protected $fillable=['orderId','pid','quantity'];

}
