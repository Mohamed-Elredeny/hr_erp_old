<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public $id;
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
        /*$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:profile_maintenance')->except('logout');*/
    }

    public function showLoginForm($entity)
    {
        return view('login',compact('entity'));
    }

    public function UserLogin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            config()->set('auth.defaults.guard', 'admin');
            $this->id = auth()->user()->id;
            return redirect()->route('admin.dashboard');
        }

        if (Auth::guard('performance')->attempt(['email' => $request->email, 'password' => $request->password])) {

            config()->set('auth.defaults.guard', 'performance');
            $this->id = auth()->user()->id;
            return redirect()->route('performance.dashboard');
        }

        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password])) {
            config()->set('auth.defaults.guard', 'manager');
            $this->id = auth()->user()->id;
            return redirect()->route('manager.dashboard');
        }
        if (Auth::guard('employee')->attempt(['emailWork' => $request->email, 'password' => $request->password,'company_id'=>$request->company_id,'activation_token'=>'1'])) {

            config()->set('auth.defaults.guard', 'employee');
            $this->id = auth()->user()->id;
            return redirect()->route('employee.home');
        }

        return redirect()->route('hh')->with('error', "Dear Colleague, please make sure you've entered the correct credentials.");
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('performance')->logout();
        Auth::guard('manager')->logout();
        Auth::guard('employee')->logout();
        Auth::guard('web')->logout();
        return redirect()->back();
    }
}
