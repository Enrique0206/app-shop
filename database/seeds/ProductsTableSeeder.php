<?php

use Illuminate\Database\Seeder;
use App\Product;  // definimos la ubicacion del modelo Product

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usando model factories
		//factory(Product::class)->make();  crea objetos
		factory(Product::class, 100)->create(); //  crea objetos y los guarda en la base de datos (100 objetos)
    }
}
