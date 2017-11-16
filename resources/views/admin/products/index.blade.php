<!--se agrega el contenido de la vista login (login.blade.php) para tomarlo como base-->

@extends('layouts.app')

@section('title', 'Listado de Productos' )

@section('body-class', 'product-page') <!--aca agregamos la seccion body-class y le damos signup-page como valor(para la tabla productos y corregir la altura se cambio landing por product)--> 

@section('content')<!--se copia el html de la plantilla landing-page.html y se modifica el url de imagen con un asset--->

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        
</div>

<div class="main main-raised">
	<div class="container">
			
	    <div class="section text-center">
	        <h2 class="title">Lista de Productos</h2>
			<div class="team">
				<div class="row">
					
					<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
					
					<table class="table">
						
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Categoria</th>
								<th class="text-right">Precio</th>
								<th class="text-right">Opciones</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($products as $product)
							<tr>
								<td class="text-center">{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->category ? $product->category->name : 'General' }}</td> <!--si la categoria del producto existe mostra el nombre sino mostrar general-->
								<td class="text-right">&euro; {{ $product->price }}</td>
								<td class="td-actions text-right">
									<button type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
										<i class="fa fa-info"></i>
									</button>
									<a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
										<i class="fa fa-edit"></i>
									</a>
									<a href="{{ url('/admin/products/'.$product->id.'/delete') }}" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						
					</table>						
					
					{{ $products->links() }} <!--muestra el listado de link de la paginacion-->
			    </div>
			</div>
		</div>

	</div>	    
</div>

		
<footer class="footer">
	<div class="container">
	    <nav class="pull-left">
	        <ul>
	            <li><a href="http://www.creative-tim.com">Creative Tim</a></li>
				<li><a href="http://presentation.creative-tim.com">About Us</a></li>
	            <li><a href="http://blog.creative-tim.com">Blog</a></li>         
	            <li><a href="http://www.creative-tim.com/license">Licenses</a></li>            
	        </ul>   
	    </nav>
	        <div class="copyright pull-right">
	            &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
	        </div>
	</div>
</footer>
@endsection
