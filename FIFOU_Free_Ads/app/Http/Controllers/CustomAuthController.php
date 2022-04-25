<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;






class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::guest())
            return view('login');
        else
            return redirect()->route('index')->withSuccess('You are allready loged in');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->admin)
                return redirect("admin")->withSuccess('Welcome ' . $user->nickname);
            else
                return redirect()->route('index')->withSuccess('Welcome ' . $user->nickname);
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|min:10|max:13',
            'nickname' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('index')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'nickname' => $data['nickname'],
            'admin' => 0,
            'password' => Hash::make($data['password'])
        ]);
        return $user;
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
