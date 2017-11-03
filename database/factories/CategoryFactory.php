<?php

use Faker\Generator as Faker;
use App\Category; //definimos ubicacion del modelo Category

$factory->define(Category::class, function (Faker $faker) { //reemplazamos Model por Category
    return [
        //definiendo fakers 
		'name' => ucfirst($faker->word), //ucfirts define la primera letra en mayuscula
		'description' => $faker->sentence(10)
		
    ];
});
