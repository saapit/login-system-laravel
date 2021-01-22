<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = \App\Siswa::all();
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
        // line below after using use in line 6
        Siswa::create($request->all());
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

        $siswa = Siswa::find($id);
        $siswa->update($request->all());

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
        //
    }
}
