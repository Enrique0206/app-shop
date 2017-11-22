<?php
//se creo este modelo con el comando    php artisan make:model ProductImage -m
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //productImage->product
	public function product()
	{
		return $this->belongsTo(Product::class); //que imagen le pertenece a este producto
	}
	
	public function getUrlAttribute()
	{
		if(substr($this->image, 0, 4) === "http"){
			return $this->image;
		}
		
		return '/images/products/' . $this->image;
	}
	
}

/*hay que salir de tinker y volver a ingresar
 
 hacemos nuestras consultas
 
 $p = App\Product::first(); //muestra el primer producto
 $p->images					//las imagenes que contiene este producto
 $p->images()->count()		//la cantidad de imagenes en numeros que contiene este producto
 
 */