<?php
//se creo este middleware con el siguiente comando:  php artisan make:middleware AdminMiddleware
namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		/*if(!auth()->check()){
			return redirect('/login');	//retiramos esto
		}*/
		if(!auth()->user()->admin){
			return redirect('/');
		}
        return $next($request);
    }
}
