<?php

namespace App\Http\Controllers\Auth;
use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserAccVerifyMailable;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {


        /** @var User $user */
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $errors = $validator->errors();

            if($errors->has('email'))
            {
                $return['status'] = FALSE;
                $return['message'] = $errors->get('email');
            }
            else if($errors->has('password'))   
            {
                $return['status'] = FALSE;
                $return['message'] = $errors->get('password');
            }         

            return response()->json($return);
        }
        //------------------------------------------------------
        try {

            $activation_code = str_random(30).time();

            User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'activation_code' => $activation_code,
            'status' => '2',
            ]);
            
        } catch (\Exception $exception) {
            logger()->error($exception);
            $return['status'] = FALSE;
            $return['message'] = 'Oops! We could not register you. Please try again later.';
        }

        $token = $activation_code;
        // $mailContent['mail'] = 'nidheesh.tk@pickzy.com';
        Mail::to($request->input('email'))->send(new UserAccVerifyMailable($token));

        // $user->notify(new UserRegisteredSuccessfully($user));
        
         $return['status'] = TRUE;
         $return['message'] = 'Successfully created a new account. Please check your email and activate your account.';

         return response()->json($return);

    }

    public function activateUser(string $activationCode)
    {

        try {

            $user = User::where('activation_code', $activationCode)->first();
            if (!$user) {
                return "The code does not exist for any user in our system.";
            }

            
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        return redirect()->to('/home');
    }
}
