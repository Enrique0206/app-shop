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
			
			$table->string('name')->nullable(); //se ingresa tabla description, no es obligatorio (nulloable)
			$table->string('description')->nullable(); //se ingresa tabla description, no es obligatorio (nulloable)
			$table->string('image')->nullable(); //se ingresa tabla imagen, no es obligatorio (nulloable)
			
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
