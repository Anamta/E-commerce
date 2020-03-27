<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategorie;


class Categorie extends Model
{
    public function subcategorie()
    {
        return $this->hasMany('App\Subcategorie');
    }
}
