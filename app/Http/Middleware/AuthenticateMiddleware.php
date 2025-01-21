<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;
use App\Models\Category;


class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::id()==null)
        {
            return redirect()->route('admin.login')->with('error', 'Login to send');
        }
        $categories = Category::all();
        // Chia sẻ dữ liệu với các view trong khu vực admin
        View::share('categories', $categories);
        return $next($request);
    }
}
