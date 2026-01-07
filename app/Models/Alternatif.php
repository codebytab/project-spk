<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;

class Alternatif extends Model
{
    protected $table = 'alternatif'; // penting karena bukan plural default
    protected $fillable = ['nama_alternatif'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
