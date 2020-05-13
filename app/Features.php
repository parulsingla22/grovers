<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    
    protected $table="features";
    protected $fillable=['icon','title','description','active'];
}
