<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //declariton sebab nama table bukan dalam english dan tak ikut convention laravel
    protected $table = 'mapel';
    protected $fillable = ['code', 'name', 'semester'];

    // nak hubungankan table siswa dan mapel
    public function siswa()
    {
        // relation between siswa dan mapel
        return $this->belongsToMany(Siswa::class)->withPivot(['value'])->withTimestamps();
    }

    // satu mapel-satu guru relation
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
