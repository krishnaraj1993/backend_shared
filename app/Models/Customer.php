<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
    public static function getAllCategory(){
        return Category::orderBy('id','ASC')->pluck('title','id');
       
    }
    public static function getAllProduct(){
        return Product::orderBy('id','desc')->pluck('id','cat_id','title','price','description','photo');
    }

    
}
