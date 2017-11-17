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
	{										//dd($request->all()); nos permite visualizar los datos (como un tes de prueba-como echo)
		
		//validaciones y  mensajes personalizados
		$messages = [
			'name.required' => 'es necesario ingresar un nombre para el producto.',
			'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
			'description.required' => 'La descripcion corta es un campo obligatorio.',
			'description.max' => 'La descipcion corta solo admite hasta 200 caracteres.',
			'price.required' => 'es obligatorio definir un precio al producto.',
			'price.numeric' => 'Ingrese un precio valido.',
			'price.min' => 'No se admiten valores negativos.'
		];
		
		$rules = [
			'name' => 'required|min:3', //obligatorio/minimo 3 letras
			'description' => 'required|max:200', //obligatorio/maximo 200 caracteres
			'price' => 'required|numeric|min:0' //obligatorio/numeros minimo 0 (no negativos)
		];
		$this->validate($request, $rules, $messages);
		
		
		//registro de productos en la bd
		$product = new Product();
		
		$product->name = $request->input('name');
		$product->description = $request->input('description');		
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		
		$product->save();
		
		return redirect('/admin/products'); //se define la ruta a donde redireccinar una ves enviado los datos
	}
	
	public function edit($id)
	{
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product')); 
	}
	
	public function update(Request $request, $id) 
	{
		
		$product = Product::find($id);
		
		$product->name = $request->input('name');
		$product->description = $request->input('description');		
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		
		$product->save();//update
		
		return redirect('/admin/products'); 
	}
	
	public function destroy($id) 
	{		
		$product = Product::find($id);
			
		$product->delete();//borrar
		
		//return redirect('/admin/products'); 
		return back(); //en ves del return de arriba, tambien podemos hacerlo asi, te regresa al listado anterior
	}
}


/*vamos a crear  una carpeta admin dentro de resource->views y dentro de admin una carpeta products
 vamos a copiar el archivo welcome.blade.php y la copiaremos en  resource->views->products
 y la renombraremos como index.blade.php y otro con el nombre de create.blade.php
 */