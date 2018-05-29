<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Pemasukan extends Model
{
    protected $table = 'kategori_pemasukan';
    protected $fillable = [
        'nama_kategori',
    ];
}
