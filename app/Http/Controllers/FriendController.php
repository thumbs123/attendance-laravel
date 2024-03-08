<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Http\Requests\StoreFriendRequest;
use App\Http\Requests\UpdateFriendRequest;
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
        return view('dashboard.attendance.index', compact('friends'));
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
        return view('dashboard.posts.show',[
            'friend' => $friend
        ]);
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
}
