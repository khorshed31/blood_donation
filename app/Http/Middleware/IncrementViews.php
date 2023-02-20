<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Module\Blog\Models\Blog;

class IncrementViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $post = Blog::where('slug_code',$request->route('slug'))->first();
        $post->increment('views');

        return $response;
    }
}
