<?php

namespace App\Http\Middleware\Cache;

use Closure;
use App\Http\Middleware\Cache\MakeCacheKey;

class Put
{
    use MakeCacheKey;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $key = $this->makeCacheKey($request);

        if(! \Cache::has($key)) \Cache::put($key, $response->getContent(), 1);

        return $response;
    }
}
