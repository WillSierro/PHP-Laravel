<?php

namespace App\Http\Middleware;
use App\LogAcesso;

use Closure;

class LogAcessoMiddleware
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
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);
        // $request - manipular
        return $next($request);
        // response - manipular
        // return Response('Chegamos aqui no Middleware');
    }
}
