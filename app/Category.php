<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->products
	public function products()
	{
		return $this->hasMany(Product::class); //estos tiene muchos productos
	}
}

/*una vez terminado, accedemos al comando php artisan tinker
 y agegamos los comandos para hacer test de las relaciones hechas
 
 use App\Product;
 use App\Category;
 
  $c = Category::first();	 --para ver la primea categoria--
 
  $c->products				--para ver los productos que estan dentro de esa categoria--
 
  $c->products()->count()	--si nos interesa obtener la cantidad de productos--

   
  $p = Product::first();	 --para obtener el primer producto--
 
  $p->Category				--para ver los categoria a la que este producto pertenece--
 
 
 */