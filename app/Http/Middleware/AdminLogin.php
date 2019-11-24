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
        $user = $request->session()->get('user_name');
        $id = $request->session()->get('id');
        $role = $request->session()->get('role');
        if (!$this->adminIsLogined($id,$user,$role)) {
           return redirect()->route('view.home');
           //NGAN TRUY CAP VAO DASHBOARD KHI CHUA LOGIN
        }       
        return $next($request);
    }
     private function adminIsLogined($id, $user,$role){
        $id = (is_numeric($id) && $id>0)? true : false;
        $user = empty($user) ? false : true;
        $role =  (is_numeric($role) && $role==0)? true : false;
        if ($id && $user && $role) {
           return true;
        }
        return false;
    }
}
