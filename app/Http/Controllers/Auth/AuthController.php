<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Event;
use App\User;
use Socialite;
use Validator;
use Sp\Models\Category;
use Sp\Models\Settings;
use Illuminate\Http\Request;
use Sp\Events\Users\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        view()->share('navCategories', Category::whereActive(1)->orderBy('id', 'ASC')->get());
        view()->share('siteSettings', Settings::first());

        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:6|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'email_verification_token' => $data['email_verification_token'],
            'active' => $data['active'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected $redirectPath = '/news';

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        if($authUser)
        {
            Auth::login($authUser, true);
        }


        return redirect()->to('news');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
            if($authUser->active == 1)
            {
                return $authUser;            
            }else{
                return false;
            }
        }else{

            $settings = Settings::first();

            if($settings->allow_registration == 0)
            {

                return false;
                
            }
        
            
        }

        

        $name = $facebookUser->name;
        list($first_name, $last_name) = explode(' ', $name, 2);
        // dd($facebookUser);

        return User::create([
            'name' => $first_name,
            'surname' => $last_name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => str_replace('1920', '320', $facebookUser->avatar_original),
            'email_verification_token' => str_random(60),
            'active' => 1
        ]);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);
        $credentials = array_add($credentials, 'active', 1);

        

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $input = $request->all();
        $input['email_verification_token'] = str_random(60);
        $input['active'] = 0;

        $user = $this->create($input);

        // Auth::login($user);

        Event::fire(new UserRegistered($user));

        flash()->success('Ti abbiamo inviato una mail per verificare i tuoi dati.');

        return redirect($this->redirectPath());
    }
}
