<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
//use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
//use Mail;
//use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.passwords.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
//            'emailWork' => 'required|exists:employees',
        ]);

        $token = Str::random(64);
        $user = Employee::where('emailWork', $request->emailWork)->where('activation_token', 1)->whereNotNull('password')->get();
        if(count($user)>0){
             DB::table('password_resets')->insert([
            'email' => $request->emailWork,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.passwords.email', ['token' => $token], function($message) use($request){
            $message->to($request->emailWork);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Forgot password request created successfully, please check your mail to activate your account');
        }
        return back()->with('error',"Dear Colleague, please note that you have to register by clicking 'Join Now' to create your account.");
       
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) {
        return view('auth.passwords.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
//        $request->validate([
//            'emailWork' => 'required|exists:employees',
//            'password' => 'required|string|min:4|confirmed',
//            'password_confirmation' => 'required'
//        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->emailWork,
                'token' => $request->token
            ])
            ->first();
//dd($updatePassword);
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Employee::where('emailWork', $request->emailWork)
            ->update(['password' => Hash::make($request->password)]);
//        dd($user);
        DB::table('password_resets')->where(['email'=> $request->emailWork])->delete();

        return redirect('/')->with('success', "Dear Colleague, your password has been changed! You can now log in.");
    }
}
