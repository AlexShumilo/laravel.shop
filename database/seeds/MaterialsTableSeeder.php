<?php

use Illuminate\Database\Seeder;
use App\Material;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'mat_code'=> 'plastic',
            'mat_name'=>'Пластик',
        ]);
        Material::create([
            'mat_code'=> 'metal',
            'mat_name'=>'Метал',
        ]);
        Material::create([
            'mat_code'=> 'wood',
            'mat_name'=>'Дерево',
        ]);
        Material::create([
            'mat_code'=> 'ceramics',
            'mat_name'=>'Керамика',
        ]);
        Material::create([
            'mat_code'=> 'glass',
            'mat_name'=>'Стекло',
        ]);
        Material::create([
            'mat_code'=> 'textile',
            'mat_name'=>'Ткань',
        ]);
        Material::create([
            'mat_code'=> 'combined',
            'mat_name'=>'Комбинированный',
        ]);
    }
}
