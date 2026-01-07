<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = ['nama_kriteria', 'bobot', 'jenis'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
