<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // se creo por defecto
			
			$table->string('name')->nulllable; //se ingresa tabla description, no es obligatorio (nonulloable)
			$table->string('description')->nulllable; //se ingresa tabla description, no es obligatorio (nonulloable)
			$table->string('image')->nullable; //se ingresa tabla imagen, no es obligatorio (nonulloable)
			
            $table->timestamps(); //se creo por defecto
			//una vez creado las tablas agregar el comando php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
