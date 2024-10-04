<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        // $this->middleware('guest:writer')->except('logout');
    }
    // For Admin
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // dd(Auth::guard('admin'));
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    // For Donor
    public function showDonorLoginForm()
    {
        return view('auth.login', ['url' => 'donor']);
    }

    public function DonorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $donor = Donor::where('email', $request->email)->first();
        if ($donor && Hash::check($request->password, $donor->password)) {
            // Password is correct, log the donor in
            Auth::guard('donor')->login($donor);
            return redirect()->intended('/donor');
        } else {
            // Invalid password
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
