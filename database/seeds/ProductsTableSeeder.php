<?php

use Illuminate\Database\Seeder;
use App\Product;  // definimos la ubicacion del modelo Product
use App\Category; //se defione la ubicacion del modelo Category
use App\ProductImage; //se defione la ubicacion del modelo ProductImage


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
		
		factory(Category::class, 5)->create(); //creando 5 categorias*/
		factory(Product::class, 100)->create(); //  crea objetos y los guarda en la base de datos (100 objetos)
		factory(ProductImage::class, 200)->create(); //creando 200 imagenes
	}
}

/*una vez finalizado esta parte ejecutamos el seeder con el comando
php artisan migrate:refresh --seed */