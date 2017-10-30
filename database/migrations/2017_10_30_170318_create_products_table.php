<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('name');
			$table->string('description');
			$table->text('long_description')->nullable();
			$table->float('price');
			
			//FK creando llave foranea de productos a categoria- ver documentacion
			$table->integer('category_id')->unsigned()->nullable(); //moelo al que queremos hacer referencia
			$table->foreign('category_id')->references('id')->on('categories'); //la llave foranea categorie_id hace referencia al id de la tabla categories
			
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
        Schema::dropIfExists('products');
    }
}
