<?php
//se crea el controlador Image - php artisan make:controller ImageController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Product;//declarando el uso de clase product

class ImageController extends Controller
{
	public function index($id){
		
		$product = Product::find($id);
		$images = $product->images;
		return view('admin.products.images.index')->with(compact('product', 'images'));
	}
	
	public function store(){
		
	}
	
	public function destroy(){
		
	}
}
