<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && in_array($user->role, $roles)) {
            if ($user->role == 'customer') {
                return redirect('/'); // Redirect to home for customers
            } elseif ($user->role == 'master_admin' || $user->role == 'restaurant_admin') {
                return redirect('/dashboard'); // Redirect to dashboard for master_admin or restaurant_admin
            }
        }

        return redirect('/restaurants'); // Default redirection for unauthorized access
    }
}
