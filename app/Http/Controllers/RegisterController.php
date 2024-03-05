<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title'=> 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
       $validateData = $request->validate([
        'name' => 'required | max:255',
        'username' => ['required','min:3','max:255','Unique:users'],
        'email' => 'required | email | unique:users',
        'password' => 'required | min:5 | max:255',
       ]);

       //$validateData['password'] = bcrypt($validateData['password']);
       
       $validateData['password'] = Hash::make($validateData['password']);


       User::create($validateData);

       //$request->session()->flash('status', 'Task was successful!');
       
       return redirect('/login')->with('success', 'Registration success');
    }
}
