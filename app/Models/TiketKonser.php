<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketKonser extends Model
{
    protected $fillable =[
        'nama_konser', 'guest_star', 'jenis_tiket', 'description', 'tanggal', 'tempat', 'harga_tiket', 'stok_tiket'
    ];
}
