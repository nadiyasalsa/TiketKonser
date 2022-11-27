<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable =[
        'kode_tiket','tanggal_order', 'batas_transaksi', 'subtotal', 'metode_transaksi', 'bukti_transaksi'
    ];
}
