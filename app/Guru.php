<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // declareasi table sebab bukan guna bahasa english
    protected $table = 'guru';

    protected $fillable = ['name', 'phone', 'address'];

    // nak hubungkan dgn table mapel
    public function mapel()
    {
        // one-to-many relation
        return $this->hasMany(Mapel::class);
    }
}
