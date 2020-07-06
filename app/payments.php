<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table="payments";
	protected $fillable=['orderId','amount','discount','delivery','total'];

}
