<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class VendorMiddleware
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
        if (Auth::user()->role_as == 'vendor'){
            if (Auth::check() && Auth::user()->isban)
            {
                $banned = Auth::user()->isban == "1";
                Auth::logout();
                if ($banned == 1){
                    $message = "Your account has been Banned. Please contact Administrator";
                }

                return redirect()->route('login')
                    ->with('status',$message)
                    ->withErrors(['email'=>'Your account has been Banned. Please contact Administrator']);
            }

            if (Auth::check())
            {
                $expiresAt = Carbon::now()->addMinute(1);
                Cache::put('user-is-online'.Auth::user()->id,true,$expiresAt);
            }

            return $next($request);
        } else {
            return redirect('/home')->with('status','You are no allowed to access the vendor dashboard!');
        }

    }
}
