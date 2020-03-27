<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name','price','image','description','sub_category_id'];

    public function subcategorie()
    {
        return $this->hasOne('App\Subcategorie','id','sub_category_id');
    }
}
