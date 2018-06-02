<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKategori extends Model
{
    protected $table = 'jeniskategori';
    protected $fillable = [
        'id','nama_jenis','role',
    ];
}
