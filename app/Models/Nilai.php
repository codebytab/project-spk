<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alternatif;
use App\Models\Kriteria;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
