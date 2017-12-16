<?php
//asdffff
namespace App;
//master branch change
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = "messages";
    
    protected $fillable = ['author','content'];
}
