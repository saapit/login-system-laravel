<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // kita declare table nama yang kita design, sepatutnya single->plural
    // kita bagitau laravel, ini nama table kita
    protected $table = 'siswa';

    protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'religion', 'address'];
}
