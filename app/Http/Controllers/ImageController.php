<?php
//se crea el controlador Image - php artisan make:controller ImageController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Product;//declarando el uso de clase product
 use App\ProductImage; //declaramos la clase para poder subir las imagenes con el codigo creado
 use File; //para hacer uso de la clase Find
 
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
		$moved = $file->move($path, $fileName); // creamos $moved para asegurarnos que la imagen se a guardado correctamente
		
		//crear un registro en la tabla product_images
		if($moved){
			$productImage = new ProductImage();
			$productImage->image = $fileName;
			//$productImage->featured = false; //lo comentaremos porque no queremos que las nuevas imagenes sean destacadas por defecto
			$productImage->product_id = $id;
			$productImage->save(); //para que de origen al Insert correspondiente
		}
		return back();
		
	}
	
	public function destroy(Request $request, $id){
		
		//eliminar el archivo
		$productImage = ProductImage::find($request->image_id);
		if(substr($productImage->image, 0, 4) === "http"){
			$deleted = true;
		}else{
			$fullPath = public_path() . '/images/products/' . $productImage->image;
			$deleted = File::delete($fullPath);
		}
		
		//eliminar el registro de la imagen en la bd
		if($deleted){
			$productImage->delete();
		}
		
		return back();
	}
}
