<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class); //descomentamos esto porque necesitamos para que el database seeder llame al seeder de usuario     
		//si tuvieramos mas seeder tendriamos que agregarlos, siguiendo la misma idea
	
		$this->call(ProductsTableSeeder::class); //llamando al seeder del producto
	}
}
