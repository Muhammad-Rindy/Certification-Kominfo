<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PakRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showApproveUsers()
    {
        $users = User::where('role', 'warga')->where('approval_status', false)->get();

        $datas = DB::table('warga_form')->where('approved_by_rt', false)->get();

        return view('approve_users', compact('users', 'datas'));
    }







    public function approveUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->approval_status = true;
        $user->save();

        return redirect()->back()->with('success', 'User has been approved.');
    }
    public function approveUserDoc($userId)
    {
        DB::table('warga_form')
            ->where('id', $userId)
            ->update(['approved_by_rt' => true]);

        return redirect()->back()->with('success', 'User has been approved.');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}