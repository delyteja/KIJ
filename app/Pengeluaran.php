<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
	protected $table = 'pengeluaran';

    protected $fillable = [
        'user_id', 'date_created', 'time_created','nama_transaksi','jumlah','kategori_id','nama_bukti','lokasi',
    ];
}

