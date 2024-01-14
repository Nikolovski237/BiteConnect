<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Your login form view
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function redirectPath()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'master_admin':
                return '/dashboard'; // Customize this for your admin dashboard path
            case 'restaurant_admin':
                return '/dashboard'; // Customize this for your restaurant admin dashboard path
            default:
                return '/'; // Default redirect path for other roles (e.g., customers)
        }
    }
}
