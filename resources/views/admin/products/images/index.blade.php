<!--se agrega el contenido de la vista login (login.blade.php) para tomarlo como base-->

@extends('layouts.app')

@section('title', 'Imagenes de Productos' )

@section('body-class', 'product-page') <!--aca agregamos la seccion body-class y le damos signup-page como valor(para la tabla productos y corregir la altura se cambio landing por product)--> 

@section('content')<!--se copia el html de la plantilla landing-page.html y se modifica el url de imagen con un asset--->

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        
</div>

<div class="main main-raised">
	<div class="container">
			
	    <div class="section text-center">
	        <h2 class="title">Imagenes de Producto seleccionado</h2>
		
			<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Subir nueva imagen</a>
		</div>

	</div>	    
</div>

@include('includes.footer')

@endsection
