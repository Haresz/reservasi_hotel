<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_pemesan', 'tipe_kamar', 'harga', 'tanggal_pembayaran', 'metode_pembayaran', 'check_in'
    ];
}
