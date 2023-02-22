<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autorizacao {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $admin, $cliente, $anunciante) {
        if (session()->has('usuario')) {
            $tipoUsuario = session()->get('acesso');

            $podeAcessarAdmin = $tipoUsuario == 'admin' && $admin == 'true';
            $podeAcessarAnunciante = $tipoUsuario == 'anunciante' && $anunciante == 'true';
            $podeAcessarCliente = $tipoUsuario == 'cliente' && $cliente == 'true';

            if ($podeAcessarAdmin || $podeAcessarAnunciante ||  $podeAcessarCliente) {
                return $next($request);
            } else {
                return redirect('/')->withErrors(['msg' => 'Você não tem permissão para acessar este recurso']);
            }
        }

        return redirect('/')->withErrors(['msg' => 'Você não está logado']);
    }
}
