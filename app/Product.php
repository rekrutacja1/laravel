<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description'];
    
    public function prices(){
        return $this->hasMany('App\Price');
    }
}
