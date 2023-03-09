<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Student;
use App\MyCourse;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register', 'registerStudent']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Email or Password Invalid'], 401);
       

    }

    public function register(Request $request){
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'policy' => 'required'
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user
           
        ]);
    }
    public function registerStudent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'department' => 'required',
            'gender' => 'required',
            'matric_no' => 'required|string|unique:students',
            'phone_number' => 'required|string'
        ]);
        $user = User::create([
            'name' => $request->name,
            'role' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $year = date('Y');
        Student::create([
            'user_id' => $user->id,
            'dept_id' => $request->department,
            'phone' => $request->phone_number,
            'session' => $year . '/' . ( $year + 1),
            'gender' => $request->gender,
            'matric_no' => $request->matric_no
        ]);
        MyCourse::create([
            'user_id' => $user->id,
            'dept_id' => $request->department,
            'level' => '100 Level',
            'semester' => 'First'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
            'user' => $this->guard()->user()
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
