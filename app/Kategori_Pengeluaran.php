<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Pengeluaran extends Model
{
    protected $table = 'kategori_pengeluaran';
    protected $fillable = [
        'nama_kategori',
    ];
}
