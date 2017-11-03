<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;  //se agrega la ubicacion de la clase Product

class TestController extends Controller
{
	public function welcome()
	{
		//vamos a inyectar la informacion de la variable products hacia la vista welcome.blade
		$products = Product::all();
		return view('welcome')->with(compact('products')); //con la funcionm compact traemos toda la informacion
	}
}
