<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'cat_code'=> 'dishes',
            'cat_name'=>'Посуда',
        ]);
        Category::create([
            'cat_code'=> 'kitchen',
            'cat_name'=>'Кухонные принадлежности',
        ]);
        Category::create([
            'cat_code'=> 'bath',
            'cat_name'=>'Для ванны',
        ]);
        Category::create([
            'cat_code'=> 'goods',
            'cat_name'=>'Хозтовары',
        ]);
    }
}
