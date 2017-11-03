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
		return view('admin.products.index'); //retorna el formulario (entre parentesis esta la ruta)
	}
	
	public function store() //este metodo registrara el producto en la bd
	{
		
	}
}


/*vamos a crear  una carpeta admin dentro de resource->views y dentro de admin una carpeta products
 vamos a copiar el archivo welcome.blade.php y la copiaremos en  resource->views->products
 y la renombraremos como index.blade.php y otro con el nombre de create.blade.php
 */