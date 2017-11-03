<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //creando los metodos definidos en web.php
	public function index()
	{
		//$products = Product::all();
		$products = Product::paginate(10); //para paginar usamos el metodo paginate. hacemos al metodo all como comentario
		return view('admin.products.index')->with(compact('products')); //retorna el listado de producto (entre parentesis esta la ruta)
	}
	
	public function create()
	{
		return view('admin.products.create'); //retorna el formulario (entre parentesis esta la ruta)
	}
	
	public function store(Request $request) //este metodo registrara el producto en la bd- con el uso de la clase Request(dentro del parentesis) para registrar un producto
	{
		//dd($request->all()); nos permite visualizar los datos (como un tes de prueba-como echo)
		$product = new Product();
		
		$product->name = $request->input('name');
		$product->description = $request->input('description');		
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		
		$product->save();
		
		return redirect('/admin/products'); //se define la ruta a donde redireccinar una ves enviado los datos
	}
}


/*vamos a crear  una carpeta admin dentro de resource->views y dentro de admin una carpeta products
 vamos a copiar el archivo welcome.blade.php y la copiaremos en  resource->views->products
 y la renombraremos como index.blade.php y otro con el nombre de create.blade.php
 */