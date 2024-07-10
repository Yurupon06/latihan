<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'name',
        'id_guru',
        'jk',
        'notelp',
    ];

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
