<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'mat_name', 'mat_code'
    ];

    // уставнока связи один-ко-многим к таблице товаров
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
