<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    protected $table="Menus";
    protected $fillable=['item','ref','menuid','active'];
}
