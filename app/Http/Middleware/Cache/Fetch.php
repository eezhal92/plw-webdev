<?php

namespace App\Http\Middleware\Cache;

use Closure;
use App\Http\Middleware\Cache\MakeCacheKey;

class Fetch
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
        $key = $this->makeCacheKey($request);

        if (\Cache::has($key)) return \Cache::get($key);

        return $next($request);
    }


}
