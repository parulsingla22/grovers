<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    protected $table="blog";
    protected $fillable=['title','category','body','tags','publishedOn','photo','active'];
}
