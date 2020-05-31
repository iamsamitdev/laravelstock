<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        // ตรวจสอบของ Admin
        if(empty(auth()->user()->isAdmin)){ // ถ้าเป็น 0
            // Auth()->logout();
            // return redirect('login');
            return redirect('backend/nopermission')->with('error', 'You have not admin access');
        }else{
            if(auth()->user()->isAdmin == 1){
                return $next($request); // ผ่านกฏเกณฑ์ที่กำหนด
            }
        }
        
    }
}
