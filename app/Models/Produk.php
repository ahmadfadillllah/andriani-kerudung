<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'nama',
        // 'gambar1',
        'jenisproduk_id',
        'users_id',
    ];

    // protected $guarded = [];

    public function jenisproduk()
    {
        return $this->belongsTo(JenisProduk::class, 'jenisproduk_id');
    }
}
