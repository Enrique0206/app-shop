<?php
//se creo este modelo con el comando    php artisan make:model ProductImage -m

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('image'); //indica el nombre del archivo o en todo caso la url del cual procede la imagen
			$table->boolean('feature')->default(false); //se le pone un boleano paa destacar la imagen, si es nuevo true  y si no es sera false
			
			//fk llave foranea hacia la tabla de productos
			$table->integer('product_id')->unsigned(); //unsigned indica obligatorio
			$table->foreign('product_id')->references('id')->on('products');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}


/*una vez terminado aplicaremos model factories para Category y PrroductImage

php artisan make:factory CategoryFactory
php artisan make:factory ProductImageFactory */