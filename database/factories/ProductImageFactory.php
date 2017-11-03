<?php

use Faker\Generator as Faker;
use App\ProductImage; //definiendo ubicacion del modelo ProductImage

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        //agregando faker para la tabla product_images
		'image' => $faker->imageUrl(250,250),
		'product_id' => $faker->numberBetween(1,100)
    ];
});
