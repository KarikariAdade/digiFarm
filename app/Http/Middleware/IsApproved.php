<?php

namespace App\Http\Middleware;

use App\Models\Business;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){

            $business = Business::query()->where('id', auth()->guard('business')->user()->id)->first();

            if ($business && $business->is_approved != false){
                return $next($request);
            }

            return redirect()->route('business.dashboard.not.approved');

        }
        return $next($request);
    }
}
