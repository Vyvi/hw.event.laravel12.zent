<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	//protected $table = 'todos';

    //protected $fillable = ['id','todo','created_at','updated_at'];
    protected $fillable = ['todo'];

    public static function getAll(){
    	return Todo::get();
    }
    
}
