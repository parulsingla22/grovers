<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    
    protected $table="deals";
    protected $fillable=['productid','sdate','edate','active'];
}
