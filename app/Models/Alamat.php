<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(Produk::class, 'users_id');
    }
}
