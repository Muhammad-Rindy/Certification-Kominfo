<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function showForm($userId)
    {

        $users = User::where('id', $userId)->get();

        return view('warga', ['userId' => $users]);
    }

    public function submitForm(Request $request)
    {

            DB::table('warga_form')->insert([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
             ]);

            return redirect()->route('done.form')->with('success', 'Form submitted successfully.');

    }
    public function doneForm()
    {
            return view('done');
    }

    public function alreadyFilled($userId)
    {
         $users = DB::table('users')
            ->join('warga_form', 'warga_form.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->get();

        $acc = DB::table('users')
            ->join('warga_form', 'warga_form.user_id', '=', 'users.id')
            ->select('user_id', 'approved_kelurahan')
            ->where('approved_kelurahan', true)
            ->get();

        $user_dokumen = DB::table('warga_form')->get();

         return view('upload', ['userId' => $userId], compact('users', 'acc', 'user_dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function uploadImage(Request $request)
    {
         $this->validate($request, [
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $user = auth()->user();

        DB::table('warga_form')->update([
            'user_id' => $user->id,
            'dokumen' => $path,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printAttachment()
    {
        $data = [];
        $pdf = PDF::loadView('lampiran', $data);
        return $pdf->stream('lampiran.pdf');
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