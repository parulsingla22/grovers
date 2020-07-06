<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table="orders";
	protected $fillable=['orderId','userId','name','address','contact','paymentId'];

}
