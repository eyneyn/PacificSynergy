<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Str;
use Hash;
use Auth;
use App\Mail\ForgotPasswordMail;
use Mail;
use App\Http\Requests\ResetPassword;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator -> passes()){
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            if(Auth::User()->is_role == 3)
            {
                return redirect()->intended('admin/index');
            }
            else if(Auth::user()->is_role == 2)
            {
                return redirect()->intended('manager/index');
            }
            else if(Auth::user()->is_role == 1)
            {
                return redirect()->intended('analyst/index');
            }
             else if(Auth::user()->is_role == 0)
            {
                return redirect()->intended('senior/index');
            }
            else {
                return redirect('login')->with('error','No available email or password');
            }
            } else {
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        } else {
            return redirect()->route('login')
                ->withInput()
                ->withErrors($validator);
        }
        
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registration_post(Request $request)
    {
        $user = request()->validate ([
            'employee_number' => 'required|unique:users,employee_number',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                Password::min(6)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'is_role' =>  'required'
        ]);

        $user = new User;
        $user->employee_number = trim($request->employee_number);
        $user->last_name = trim($request->last_name);
        $user->first_name = trim($request->first_name);
        $user->department = trim($request->department);
        $user->phone_number = $request->phone_number;
        $user -> email = trim($request->email);
        $user -> password = Hash::make($request->password);
        $user -> is_role = trim($request->is_role);
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/photos'), $photoName);
            $user->photo = 'uploads/photos/' . $photoName;
        }

        $user -> remember_token =  Str::random(50);
        $user -> save();

        return redirect('admin/index')->with('success', 'Register successfully.');
    }
    public function forgot()
    {
        return view('auth.forgot');
    }
    public function forgot_post(Request $request)
    {
        //dd($request->all());

        $count = User::where('email', '=', $request->email)->count();
        if($count > 0)
        {
            $user = User::where('email', '=', $request->email)->first();
            //$user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success','Password has been reset.');
        } else {
            return redirect()->back()->with('error','Email not found in the system.');
        }

    }
    public function getReset(Request $request, $token)
    {
        //dd($token);
        $user = User::where('remember_token','=', $token);
        if($user->count() == 0)
        {
            abort(403);
        }

        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data);
    }
    public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0)
        {
            abort (403);
        }
        $user = $user->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success', 'Successfully Password Reset');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
