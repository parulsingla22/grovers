<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    
    protected $table="quality";
    protected $fillable=['icon','title','desc','active'];
}
