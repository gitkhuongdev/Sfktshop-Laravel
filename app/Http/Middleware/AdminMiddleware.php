<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
            $user = Auth::guard('admin')->user();
            if ($user && $user->role == 1) {             
                return $next($request);
            }
            else {
                $request->session()->put('prevurl',url()->current());
                return redirect(url('admin/login'))
                ->with('alert','You need to log in as an admin');
            }
        }
        
}