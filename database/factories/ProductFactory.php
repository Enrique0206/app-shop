<?php

use Faker\Generator as Faker;
use App\Product;  //se agrega para indicar donde se encuentra la clase Product


//Model::class aca Model se reemplaza por el modelo que se usara (Product)
$factory->define(Product::class, function (Faker $faker) {
    return [
        //se agrega las columnas de las tablas
		//'name' => $faker->word(3),
		'name' => substr($faker->sentence(3), 0, -1), //lo modificaremos para evitar un error (por el metodo word)cuando ejecutemos el seeder al finalizar ProductTableSeeder.php- usaremos el metodo substr de php para arreglar la oracion y eliminar el punto final
		'description' => $faker->sentence(10), //le diremos afaker que genere una oracion com mpuesta de 10 palabras
		'long_description' => $faker->text, //le diremos afaker que genere un texto
		'price' => $faker->randomFloat(2, 5, 150), //le diremos a faker que genere un numero que tenga dos decimales como valor minimo 5 y maximo 150
    
		'category_id' => $faker->numberBetween(1,5)
		
		];
});
