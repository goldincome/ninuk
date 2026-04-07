<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function setPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if(isset($user->token) && empty($user->password) && $user->token == $request->token){
            return view('auth.set_password')->with(['user' => $user]);
        }
        return redirect()->route('login');
    }

    public function savePassword(Request $request){
        $request->validate([
            'password' => ['required', 'min:5', 'confirmed'],
            'captcha' => ['required', 'captcha']
        ],[
            'captcha.captcha' => 'Captcha verification failed'
        ]);
        $user = User::find($request->id);
        if(isset($user) && empty($user->password) && isset($user->token)){
            $user->password = Hash::make($request->password);
            $user->email_verified_at = now();
            $user->token = null;
            $user->save();

            $this->flashSuccessMessage('Password Successfully Set');
        }
        return redirect()->route('login');
    }

    protected function rules()
    {
        return [
            'captcha' => ['required', 'captcha'],
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'captcha.captcha' => 'Captcha verification failed'
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect($this->redirectPath())
                            ->with('success', trans($response));
    }
}
