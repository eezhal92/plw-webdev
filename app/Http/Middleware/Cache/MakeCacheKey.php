<?php

namespace App\Http\Middleware\Cache;

use Illuminate\Http\Request;

trait MakeCacheKey
{
	
	protected function makeCacheKey(Request $request)
	{
		return 'route_' . str_slug($request->path() . $request->getQueryString());
	}	
}