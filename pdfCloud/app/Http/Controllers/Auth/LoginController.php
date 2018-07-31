<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserAccVerifyMailable;

use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'identity.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );
    }

    public function login(\Illuminate\Http\Request $request) 
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $toomanyattempts = $this->sendLockoutResponse($request);

            $toomanyattempts = (isset($toomanyattempts->original['email'])) ? $toomanyattempts->original['email'] : 'Too many login attempts. Please try again later.';

            $return['status'] = FALSE;
            $return['message'] = $toomanyattempts;
            return response()->json($return);
        }

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            if($user->status == '2')
            {

                $this->incrementLoginAttempts($request);

                $activation_code = str_random(30).time();
                $update = User::where('email',$user->email)
                        ->update(['activation_code' => $activation_code]);

                Mail::to($user->email)->send(new UserAccVerifyMailable($activation_code));
            
                $return['status'] = FALSE;
                $return['message'] = 'Oops! Your mail not yet verified. We have sent a verification mail to your account, please click the verify link to activate your account.';
                return response()->json($return);
            }

            // Make sure the user is active
            if ($this->attemptLogin($request)) {
                // Send the normal successful login response
                // return $this->sendLoginResponse($request);

                

                $return['status'] = TRUE;
                $return['redirect_to'] = url('/home');
                return response()->json($return);
            
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                
                $return['status'] = FALSE;
                $return['message'] = 'Invalid Email/Password.';

                return response()->json($return);
                // return redirect()
                //     ->back()
                //     ->withInput($request->only($this->username(), 'remember'))
                //     ->withErrors(['active' => 'You must be active to login.']);

            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {   

        // $request->session()->put('login_error', trans('auth.failed'));
        // throw ValidationException::withMessages(
        //     [
        //         'error' => [trans('auth.failed')],
        //     ]
        // );

        $return['status'] = FALSE;
        $return['message'] = 'Invalid Email/Password.';

        return response()->json($return);
    }

    protected function sendSuccessLoginResponse(Request $request)
    {
        
        $return['status'] = TRUE;
        $return['message'] = 'User authenticated successfully.';

        return response()->json($return);
    }

    public function authenticated(Request $request, $user)
    {
        $return['status'] = TRUE;
        $return['redirect_to'] = url('/home');
        return response()->json($return);
    }

    protected function attemptLogin(Request $request)
    {

        
        $remember_me = $request->has('remember') ? true : false; 

        return $this->guard()->attempt(
            $this->credentials($request), $remember_me);
    }
}
