<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // kita declare table nama yang kita design, sepatutnya single->plural
    // kita bagitau laravel, ini nama table kita
    protected $table = 'siswa';

    protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'religion', 'address', 'avatar', 'user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('img/default.jpg'); //asset() helper documentation
        } else {
            return asset('img/' . $this->avatar);
        }
    }

    //siswa related->mapel, so nama as below
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['value']);
    }

    //custom
    public function avgvalue()
    {
        $total = 0;
        $sum = 0;
        // ambil nilai2 / this adalah memanggil object Siswa
        foreach ($this->mapel as $mapel) {
            // $total = $total + $mapel->pivot->value; // option
            $total +=  $mapel->pivot->value;
            $sum++;
        }
        return round($total / $sum);
    }

    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
