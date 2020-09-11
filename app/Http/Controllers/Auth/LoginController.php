<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

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

    use AuthenticatesUsers {
        attemptLogin as baseAttemptLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        DB::purge('mysql');
        config(['database.connections.mysql.database' => $request->societe]);
        Config::set('database.connections.mysql.database', $request->societe);
        return $this->baseAttemptLogin($request);
    }

    /**
     * Get the login username or email to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $identity = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);

        return $fieldName;
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'societe' => ['required', Rule::in(['AHRIES', 'interventions'])],
                'identity' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'identity.required' => trans('uccello::auth.error.identity_required'),
                'password.required' => trans('uccello::auth.error.password_required'),
                'societe.required'  => trans('uccello::auth.society_required'),
            ]
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return ['username' => $request->{$this->username()}, 'password' => $request->password];
    }

    protected function authenticated(Request $request, $user)
    {
        session(['societe' => $request->societe]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')]
        ]);
    }
}
