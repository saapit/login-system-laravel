<?php

use \App\Siswa;
use \App\Guru;

function top5()
{
    $siswa = Siswa::all();
    // map() - tambah attribute object
    $siswa->map(function ($s) {
        $s->avgvalue = $s->avgvalue();
        return $s;
    });
    // take 5 top list
    $siswa = $siswa->sortByDesc('avgvalue')->take(5);
    // dd($siswa);
    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}
