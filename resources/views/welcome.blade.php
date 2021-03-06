<!--se agrega el contenido de la vista login (login.blade.php) para tomarlo como base-->

@extends('layouts.app')

@section('title', 'Bienvenido a App Shop' )

@section('body-class', 'landing-page') <!--aca agregamos la seccion body-class y le damos signup-page como valor-->

@section('content')<!--se copia el html de la plantilla landing-page.html y se modifica el url de imagen con un asset--->
	<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">
				<div class="col-md-6">
					<h1 class="title">Bienvenido a App Shop</h1>
	                <h4>Realiza pedidos en linea y te contactaremos para coordinar la entrega</h4>
	                <br />
	                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
						<i class="fa fa-play"></i> Watch video
					</a>
				</div>
            </div>
        </div>
    </div>

	<div class="main main-raised">
		<div class="container">
		    <div class="section text-center section-landing">
	            <div class="row">
	                <div class="col-md-8 col-md-offset-2">
	                    <h2 class="title">¿Por qué?  App Shop?</h2>
	                    <h5 class="description">Puedes revisar nuestra realcion completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
	                </div>
	            </div>

				<div class="features">
					<div class="row">
		                <div class="col-md-4">
							<div class="info">
								<div class="icon icon-primary">
									<i class="material-icons">chat</i>
								</div>
								<h4 class="info-title">Atendemos tus dudas</h4>
								<p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás solo sino que siempre estamos atentos a tus inquietudes.</p>
							</div>
		                </div>
		                <div class="col-md-4">
							<div class="info">
								<div class="icon icon-success">
									<i class="material-icons">verified_user</i>
								</div>
								<h4 class="info-title">Pago seguro</h4>
								<p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado.</p>
							</div>
		                </div>
		                <div class="col-md-4">
							<div class="info">
								<div class="icon icon-danger">
									<i class="material-icons">fingerprint</i>
								</div>
								<h4 class="info-title">Informacion privada</h4>
								<p>Los pedidos que realices solo los conocerás tu a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
							</div>
		                </div>
		            </div>
				</div>
	        </div>

	        <div class="section text-center">
	            <h2 class="title">Productos disponibles</h2>

				<div class="team">
					<div class="row">
						<!--agregaremos la informacion retornada del controlador Test-->
						@foreach ($products as $product) <!--abriendo doirectiva foreach-->
						<div class="col-md-4">
			                <div class="team-player">
			                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
			                    <h4 class="title">{{ $product->name }}<br />
									<small class="text-muted">{{ $product->category->name }}</small>
								</h4>
			                    <p class="description">{{ $product->description }}</p>
								<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
								<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
								<a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>
			                </div>
			            </div>
			            @endforeach <!--cerrando directiva foreach-->
							
			        </div>
				</div>
			</div>

	    </div>


	    <div class="section landing-section">
	        <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	                <h2 class="text-center title">¿Aún no te has registrado?</h2>
					<h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
	                    <form class="contact-form">
	                        <div class="row">
	                            <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Your Name</label>
											<input type="email" class="form-control">
										</div>
	                            </div>
	                            <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Your Email</label>
											<input type="email" class="form-control">
										</div>
	                            </div>
	                        </div>

							<div class="form-group label-floating">
								<label class="control-label">Your Messge</label>
								<textarea class="form-control" rows="4"></textarea>
							</div>

	                        <div class="row">
	                            <div class="col-md-4 col-md-offset-4 text-center">
	                                <button class="btn btn-primary btn-raised">
									Send Message
									</button>
	                            </div>
	                        </div>
	                    </form>
	            </div>
	        </div>
	    </div>
	</div>

			    
	@include('includes.footer')
		
@endsection
