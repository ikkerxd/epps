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
        // DB::table('products')->insert([
        //     'category_id'=>1,
        //     'name'=>'Casco',
        //     'descripcion'=>'metalico',
        //     'contenido'=>'Minero con linterna',
        //     'price'=>25.0,
        //     'unidad_medida'=>'docena',
        //     'marca'=>'Caterpillar',
        //     'color'=>'Amarillo',
        //     'ficha_tecnica'=>'Seguridad del trabajador',
        //     'stock'=>'50',
        //     'stock_min'=>'10',
        //     'state'=> '1',

        // ]);
        factory(Product::class,100)->create();
    }
}
