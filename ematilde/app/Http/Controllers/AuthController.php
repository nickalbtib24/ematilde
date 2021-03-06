<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\TipoCliente;
use App\Perfil;
use App\VerifyUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostSignUpMail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password doesn\'t exist'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signup(Request $request)
    {
        $validation_rules = [
            'nombre_usuario' => 'required|string|max:255',
            'apellido_usuario' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'empresa_usuario' => 'required',
            'telefono_usuario' => 'required',
            'tipo_cliente' => 'required',
        ];

        $messages = [
            'nombre_usuario.required' => 'The name field is required!',
            'apellido_usuario.required' => 'The last name field is required!',
            'password.required' => 'The password field is required!',
            'email.required' => 'The email field is required!',
            'empresa_usuario.required' => 'The company name field is required!',
            'telefono_usuario.required' => 'The phone field is required',
            'tipo_cliente.required' => 'Plese select an option!',
        ];
        $input = $request->all();
        $validator = Validator::make($input,$validation_rules, $messages);
        if($validator->passes())
        {
            $user = User::create([
                'nombre_usuario' => $input['nombre_usuario'],
                'apellido_usuario' => $input['apellido_usuario'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'empresa_usuario' => $input['empresa_usuario'],
                'telefono_usuario' => $input['telefono_usuario'],
            ]);
            $perfil = Perfil::find(2);
            $tipoCliente = TipoCliente::find($input['tipo_cliente']);
            $user->perfil()->associate($perfil);
            $user->tipoCliente()->associate($tipoCliente);
            $user->save();
            $perfil->users()->save($user);

            $verifyUser = verifyUser::create([
                'user_id' => $user->id,
                'token' => Str::random(40)
            ]);
    
            $user->verifyUser()->save($verifyUser);
            $user->save();


            Mail::to($user->email)->send(new PostSignUpMail($user));
            return response()->json([
                'success' => 'Check your e-mail, we have send you an activation link.'
            ]);
        }else
        {
            return response()->json($validator->messages());
        }
    }
    public function verifyUser($token)
    {
       return "verified";
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usuario' => 'required|string|max:255',
            'apellido_usuario' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'empresa_usuario' => 'required',
            'identificacion_usuario' => 'required',
            'telefono_usuario' => 'required',
            'tipo_cliente' => 'required',
        ]);
        
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->id,
            'role' => auth()->user()->perfil->id
        ]);
    }
}