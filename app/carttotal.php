<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carttotal extends Model
{
    protected $table="carttotal";
    protected $fillable=['userid','subtotal','delivery','discount','total'];

}
