<?php

use Illuminate\Database\Seeder;
use App\User; //se agrega esto para ejecutar el seede de la clase user

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vamos a crear un nuevo ususario (antes borramos el que creamos inicialmente porque vamos a volver a crear el mismo0)
		User::create([
			//vamos a copiar los parametros que necesitamos llenar de la migracion users (2014_10_12_000000_create_users_table.php)
			'name' => 'luis enrique',
            'email' => 'luisabrigo@hotmail.com',
            'password' => bcrypt('tecsup'), //bcrypt metodo para encriptar la clave
			'admin' => true	//para el admin
			]);
    }
}
