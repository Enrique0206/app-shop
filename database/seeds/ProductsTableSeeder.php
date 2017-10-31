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
		
		/*factory(Category::class, 5)->create(); //creando 5 categorias*/
		/*factory(Product::class, 100)->create(); //  crea objetos y los guarda en la base de datos (100 objetos)
		factory(ProductImage::class, 200)->create(); //creando 200 imagenes*/
	
		$categories = factory(Category::class, 5)->create();//creamos 5 categorias que son guardadas en la base de datos
		
		$categories->each(function($category){ //para cada categoria ejecutamos esta funcion
			$products = factory(Product::class, 20)->make();//esta funcion crea 20 categorias sin guardarlo en la base de datos
			$category->products()->savemany($products); //porque luego se registra en la base de datos a travez de la relacion entre categoria y productos
			//se usara savemany para guardar un arreglo y no save que es para un solo onjeto
			$products->each(function ($p){//luego para cada uno de los productos agregados en categoria, ejecutamos esta funcion
				$images = factory(ProductImage::class, 5)->create(); // 5 imagenes que se van a crear para cada producto
				$p->images()->savemany($images);  // donde a cada producto llamado p le vamos a asignar esta coleccion de imagenes
			});
				
		});
		
		/*$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });*/
	}
}
//volvemos a ejecutar el seeder
/*una vez finalizado esta parte ejecutamos el seeder con el comando
php artisan migrate:refresh --seed */