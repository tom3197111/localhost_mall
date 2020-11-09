<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        //如果session沒有user信息
        if(!session('user')){
            //跳轉到admin/login
            return redirect('admin/login');
        }
        return $next($request);
    }
}
