<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError','Login failed!');
        
    }
    public function fetchApiQuotes(){
        $client = new Client();
        $url = "https://api-ninjas.com/api/quotes";
        $api_key = "sr4wVId/cvWVpvlNAYmAmA==44SjCTAsD6rwXZj1";

        try {
            $response = $client->request('GET', $url,[
                'header'=>[
                    'x-api-key'=>$api_key
                ]
            ]);
            if($response->getStatusCode() ==200){
                $response_ninja_api = json_decode($response->getBody()->getContents(),true);
                return response()->json([
                    'code' => 200,
                    'message' => 'Data Fetched',
                    'data' => $response_ninja_api
                ]);
            }else {
                return response()->json([
                    'code'=>404,
                    'message'=>'Whoopss! Sepertinya ada kesalahan'
                ]);
            }
        }catch(ClientException $e){
            $response = $e->getResponse();
            $response_ninja_api = json_decode($response->getBody()->getContents(),true);
            return response()->json([
                'code' => 400,
                'message' => 'Whoopss',
                'data' => $response_ninja_api
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        
        request()->session()->regenerate();

        return redirect('/');

    }
}
