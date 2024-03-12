<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = $this->fetchApiQuotes();
        return view('dashboard.index',[
            'quotes'=> $quotes
        ]);
    }

    public function fetchApiQuotes(){
        $client = new Client();
        $url = "https://api.api-ninjas.com/v1/quotes?category=happiness";
        $api_key = "sr4wVId/cvWVpvlNAYmAmA==44SjCTAsD6rwXZj1";

        try {
            $response = $client->request('GET', $url,[
            'headers'=>[
                'x-api-key'=>$api_key
                ]
            ]);
            //return response()->json($response);
            if($response->getStatusCode() ==200){
                $response_ninja_api = json_decode($response->getBody()->getContents(),true);
                return $response_ninja_api[0]['quote'];
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
}
