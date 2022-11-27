<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTiket extends Model
{
    protected $fillable =[
        'nama_konser', 'jenis_tiket', 'email', 'nama','no_hp', 'harga_tiket', 'jumlah_tiket', 'total'
    ];
}
