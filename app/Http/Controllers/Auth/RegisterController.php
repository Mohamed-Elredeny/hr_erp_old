<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public  function empRegister(Request $request){
        if($request['password'] != $request['confirm_Password']) {
            //if the password and confirm password fields don't match
            return redirect()->back()->with('error', 'Password and Confirm Password do not match.');
        }

        $employeeemailWork = $request['emailWork'];

        $employee = Employee::where('emailWork', $employeeemailWork)->whereNotIn('status', ['Under Separation', 'Seperated - RP Valid', 'Seperated - RP Valid Abroad', 'Seperated - RP Valid In Qatar', 'Seperated - RP Valid In Qatar', 'Seperated - RP Valid Abroad', 'Under Separation - Transfer Approved'])->first();

        if($employee) {
            if ($employee->company_id==$request['company_id']){
                if($employee->empCode!=$request['empCode']){
                    return redirect()->back()->with('error', "Dear Colleague, please note that you've entered the incorrect Employee Number.");
                }
                if($employee->password==null||$employee->activation_token!=1) {
                    $fileName = $request->image->getClientOriginalName();
                    $file_to_store = time() . '_' . $fileName ;
                    $request->image->move(public_path('assets/images/employees/'), $file_to_store);

                    $token = Str::random(60);
                
                    $employee->emailWork = $request['emailWork'];
                    $employee->password = Hash::make($request['password']);
                    $employee->image = $file_to_store;
                    $employee->mobile_new = $request['mobile_new'];
                     $employee->activation_token = $token;
                    $employee->save();
                    
                    // Send the activation email
    Mail::send('auth.activate_email', ['activation_token' => $token], function($message) use($request){
            $message->to($request['emailWork']);
            $message->subject('Activate Your HR Platform 360 Account Now!');
        });


                    return redirect()->route('login',['entity'=>$employee->company_id])->with('success', "Your request created successfully, please check your mail to activate your account, If you haven't received the activation email due to high demand, please wait for 30 minutes and then try again by clicking 'Join Now' to register");
                }

                return redirect()->back()->with('error', 'Dear Colleague, your account has already been created. You can log in directly.');
            }
            return redirect()->back()->with('error', 'Dear Colleague, please note that you have selected the wrong company logo. Ensure you choose the correct company logo by making the appropriate selection.');
        }
        return redirect()->back()->with('error', "Dear Colleague, please note that you've entered the incorrect email ID.");
    }
    
    public function activate($token)
    {
        $employee = Employee::where('activation_token',$token)->get();
        if (count($employee)==0) {
            return redirect()->route('hh')->with('error', 'error');
        } else {
            $employee[0]->activation_token = '1';
            $employee[0]->save();
            return redirect()->route('login',['entity'=>$employee[0]->company_id])->with('success', 'Your account activate successfully');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }
//
//    /**
//     * Create a new user instance after a valid registration.
//     *
//     * @param  array  $data
//     * @return \App\User
//     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }
}
