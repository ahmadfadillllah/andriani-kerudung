<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}