<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'prod_code'=> 'gusatnica',
            'prod_name'=>'Гусятница',
            'prod_firm'=>'Биол',
            'prod_description'=>'Отличная гусятница для вашего гуся! Объём: 6л',
            'preview'=>'/img/products/gusyatnitsa.jpg',
            'cost'=>99.99,
            'material_id'=>2,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'kazan',
            'prod_name'=>'Казанок',
            'prod_firm'=>'Биол',
            'prod_description'=>'Отличный казанок! Объём: 4л',
            'preview'=>'/img/products/kazanok.jpg',
            'cost'=>99.99,
            'material_id'=>2,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'castrulya',
            'prod_name'=>'Кастрюля',
            'prod_firm'=>'Биол',
            'prod_description'=>'Отличная кастрюля! Объём: 3л',
            'preview'=>'/img/products/kastr.jpg',
            'cost'=>55.99,
            'material_id'=>2,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'chashka',
            'prod_name'=>'Чашка',
            'prod_firm'=>'Славкерамика',
            'prod_description'=>'Отличная чашка! Объём: 0,3л',
            'preview'=>'/img/products/cup.jpg',
            'cost'=>45.99,
            'material_id'=>4,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'bokal_bud',
            'prod_name'=>'Пивной бокал',
            'prod_firm'=>'Bud',
            'prod_description'=>'Отличный бокал! Объём: 0,5л',
            'preview'=>'/img/products/bud.jpg',
            'cost'=>30.99,
            'material_id'=>5,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'bokal_carlsberg',
            'prod_name'=>'Пивной бокал',
            'prod_firm'=>'Carlsberg',
            'prod_description'=>'Отличный бокал! Объём: 0,5л',
            'preview'=>'/img/products/carls.jpg',
            'cost'=>53.99,
            'material_id'=>5,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'tarelka',
            'prod_name'=>'Одноразовая посуда',
            'prod_firm'=>'Plast',
            'prod_description'=>'Отличная тарелка! Объём: 0,3л',
            'preview'=>'/img/products/plastic.jpg',
            'cost'=>9.99,
            'material_id'=>1,
            'category_id'=>1
        ]);
        Product::create([
            'prod_code'=> 'hlebnica',
            'prod_name'=>'Хлебница',
            'prod_firm'=>'Plast',
            'prod_description'=>'Отличная хлебница!',
            'preview'=>'/img/products/hlebplast.jpg',
            'cost'=>15.99,
            'material_id'=>1,
            'category_id'=>2
        ]);
        Product::create([
            'prod_code'=> 'hlebnica_big',
            'prod_name'=>'Хлебница большая',
            'prod_firm'=>'Bread',
            'prod_description'=>'Отличная большая хлебница!',
            'preview'=>'/img/products/hlebbig.jpg',
            'cost'=>79.15,
            'material_id'=>3,
            'category_id'=>2
        ]);
        Product::create([
            'prod_code'=> 'shtopor',
            'prod_name'=>'Штопор',
            'prod_firm'=>'Vine',
            'prod_description'=>'Отличный штопор!',
            'preview'=>'/img/products/shtopor.jpg',
            'cost'=>10.45,
            'material_id'=>7,
            'category_id'=>2
        ]);
        Product::create([
            'prod_code'=> 'polka',
            'prod_name'=>'Полка для ванны',
            'prod_firm'=>'Bath',
            'prod_description'=>'Отличная полка!',
            'preview'=>'/img/products/polka.jpeg',
            'cost'=>85.65,
            'material_id'=>1,
            'category_id'=>3
        ]);
        Product::create([
            'prod_code'=> 'polotence',
            'prod_name'=>'Набор полотенец',
            'prod_firm'=>'Bath',
            'prod_description'=>'Отличные полотенца!',
            'preview'=>'/img/products/polotence.jpg',
            'cost'=>27.25,
            'material_id'=>6,
            'category_id'=>3
        ]);
    }
}
