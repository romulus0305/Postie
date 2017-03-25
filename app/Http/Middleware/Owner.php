<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;

class Owner
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
        if (Post::checkOwner($request->id) ) {

            return $next($request);
        }

        return redirect()->back();
        
    }
}
