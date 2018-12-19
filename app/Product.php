<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'prod_name',
        'prod_firm',
        'prod_code',
        'prod_description',
        'cost',
        'preview',
        'category_id',
        'material_id'
    ];

    // установка связи к категориям
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // установка связи к материалу
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
