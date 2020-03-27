<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $table = 'sub_categories';
    // public $timestamps  = false;

    public function categorie()
    {
        return $this->hasOne('App\Categorie','id','category_id');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
