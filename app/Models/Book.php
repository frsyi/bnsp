<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah',
    ];

    // public function getKodeBukuAttribute()
    // {
    //     return 'B' . str_pad($this->id, 2, '0', STR_PAD_LEFT);
    // }

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}
