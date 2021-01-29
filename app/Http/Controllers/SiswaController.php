<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

// update in Laravel 6, https://stackoverflow.com/questions/58163406/after-upgrading-laravel-from-5-6-to-6-0-call-to-undefined-str-random-function
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        if ($request->has('cari')) {
            $data_siswa = Siswa::where('first_name', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_siswa = \App\Siswa::all();
        }
        // selain compact, boleh guna ['data_siswa' => $data_siswa]
        return view('siswa.index', compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // validation (cara mudah)
        $this->validate($request, [
            'first_name' => 'required|min:4',
            'last_name' => 'required',
            // email harus unik, dan refer to database name
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'religion' => 'required',
            'avatar' => 'mimes:jpg,png'
        ]);
        // line below after using use in line 6

        //Insert ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->password = bcrypt('pass');
        $user->remember_token = Str::random(60);
        $user->save();

        // Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('img/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambah!');
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
        // without declare in line 6 -> $siswa = \App\Siswa::find($id)

        // dd(Siswa::find($id)); -> code ni nak debug

        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
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
        // cara web unpas
        // Siswa::where('id', $siswa->id)
        //     ->update([
        //         'first_name' => $request->first_name,
        //         'last_name' => $request->last_name,
        //         'gender' => $request->gender,
        //         'age' => $request->age,
        //         'religion' => $request->religion,
        //         'address' => $request->address
        //     ]);

        // untuk lihat hasil bila submit data
        // dd($request->all());

        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('img/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('success', 'Data berjaya diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data berjaya dihapus');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.profile', compact('siswa')); //pass data $siswa -> profile.blade.php
    }
}
