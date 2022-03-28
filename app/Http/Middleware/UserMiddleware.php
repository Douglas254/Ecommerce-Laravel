<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * 
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isban) // isban is a colum in our user db 
        {
            $inactive = Auth::user()->isban == '1';
            Auth::logout();

            if($inactive == 1) 
            {
                $message = "Your account has been Banned. Please Contact Administrator.";
            }
            return redirect()->route('login')
                ->with('status',$message)
                ->withErrors(['email'=> 'Your account has been Banned. Please Contact Administrator.'])
            ;
        }
        else{

            // return $next($request);
        }
    }
}
