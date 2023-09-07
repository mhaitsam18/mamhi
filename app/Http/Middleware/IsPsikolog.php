<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPsikolog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role != 'psikolog') {
            // abort(401);
            return response()->view('errors.index', [
                'title' => 'Akses ditolak',
                'message' => 'Anda tidak berwenang mengakses halaman ini',
                'code' => '401',
            ], 401);
        }
        return $next($request);
    }
}
