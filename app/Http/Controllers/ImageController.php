<?php
//se crea el controlador Image - php artisan make:controller ImageController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Product;//declarando el uso de clase product
 use App\ProductImage; //declaramos la clase para poder subir las imagenes con el codigo creado

class ImageController extends Controller
{
	public function index($id){
		
		$product = Product::find($id);
		$images = $product->images;
		return view('admin.products.images.index')->with(compact('product', 'images'));
	}
	
	public function store(Request $request, $id){
		
		//guardar img en nuestro proyecto
		$file = $request->file('photo');
		$path = public_path() . '/images/products';
		$fileName = uniqid() . $file->getClientOriginalName();
		$file->move($path, $fileName);
		
		//crear un registro en la tabla product_images
		$productImage = new ProductImage();
		$productImage->image = $fileName;
		//$productImage->featured = false; //lo comentaremos porque no queremos que las nuevas imagenes sean destacadas por defecto
		$productImage->product_id = $id;
		$productImage->save(); //para que de origen al Insert correspondiente
		
		return back();
		
	}
	
	public function destroy(){
		
	}
}
