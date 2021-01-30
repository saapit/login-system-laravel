<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //edit value
    public function editvalue(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['value' => $request->value]);
        // return $request->all();
    }
}
