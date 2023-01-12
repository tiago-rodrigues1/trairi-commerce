<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autorizacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $admin, $cliente, $anunciante)
    {
        if (session()->has('usuario'))
        {
            if (session()->get('acesso') == 'admin' && $admin == true ||
                    session()->get('acesso') == 'cliente' && $cliente == true ||
                    session()->get('acesso') == 'anunciante' && $anunciante == true)
            return $next($request);
        }
        return redirect('/');
    }
}
