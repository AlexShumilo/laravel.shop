<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cat_code', 'cat_name'
    ];

    // установка связи один-ко-многим к таблице товаров
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
