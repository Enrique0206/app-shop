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
	        <h2 class="title">Imagenes del Producto seleccionado"{{ $product->name }}"</h2>
		
			<!--creando formulario para cargar archivo-->
			<form method="post" action="" enctype="multipart/form-data"> <!--"/admin/products/4/images". (4 es el id) ya no se agrega escribe porque el action va asumir que la peticion se va hacer a una ruta exactamente igual-->
				{{ csrf_field() }}<!--por ser peticion post-->
				<input type="file" name="photo" required>				
				<button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
				<a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
			</form>
			<!--creando formulario para cargar archivo-->
			<hr/>
			<!--div para imagen-->
			<div class="row">
				@foreach ($images as $image)
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<img src="{{ $image->url }}" width="250px">								
								<form method="post" action="">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<input type="hidden" name="image_id" value="{{ $image->id }}">
									<button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
									
									@if ($image->featured) <!--si la imagen es destacada-->
										<button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
											<i class="material-icons">favorite</i>
										</button>
									@else
										<!--boton para destacar imagen-->
										<a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
											<i class="material-icons">favorite</i>
										</a>
										<!--boton para destacar imagen-->
									@endif
								</form>
								
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!--div para imagen-->
			
		</div>

	</div>	    
</div>

@include('includes.footer')

@endsection
