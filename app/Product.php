<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->category
	public function category()
	{
		return $this->belongsTo(Category::class); //un producto pertenece a una categoria
	}
	
	public  function images()
	{
		return $this->hasMany(ProductImage::class); //esto tiene muchas imagenes
	}
	
	public function getFeaturedImageUrlAttribute() //se escribe igual que el nombmbre en la line 77de welcome.blade.php (featured_image_url)
	{
		$featuredImage = $this->images()->where('featured', true)->first();
		if($featuredImage)
			$featuredImage = $this->images()->first();
		
		
		if($featuredImage){
			return $featuredImage->url;
		}
		
		return '/images/products/default.png'; //retorna la imagen default.jpg  (cuando no haya imagenes que mostrar)
	}
}



