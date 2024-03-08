<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Http\Requests\StoreFriendRequest;
use App\Http\Requests\UpdateFriendRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $friends = Friend::all();
        $quotes = $this->fetchApiQuotes();
        $quotesData = json_decode($quotes->getContent(), true);
        return view('dashboard.attendance.index', compact('friends','quotesData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'sosial' => 'required',
        ]);
        Friend::create([
            'name'=>$request->name,
            'nomor'=>$request->nomor,
            'sosial'=>$request->sosial
        ]);
        return redirect('/dashboard/attendance')->with('success', 'Teman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Friend $friend)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $friend = Friend::findOrFail($id);
        return view('dashboard.attendance.edit',[
            "friend" => $friend
        ]);

        return redirect('/dashboard/attendance')->with('success', 'Teman berhasil diperbarui');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'sosial' => 'required',
        ]);
        Friend::findOrFail($id)->update([
            'name'=>$request->name,
            'nomor'=>$request->nomor,
            'sosial'=>$request->sosial
        ]);

        return redirect('/dashboard/attendance')->with('success', 'Teman berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $friend = Friend::findOrFail($id);
        $friend->delete();
        return redirect('/dashboard/attendance')->with('success', 'Teman berhasil dihapus');
    }

    public function fetchApiQuotes(){
        $client = new Client();
        $url = "https://api.api-ninjas.com/v1/quotes";
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
}
