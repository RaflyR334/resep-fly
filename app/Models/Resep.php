<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_resep',
        'deskripsi',
        'langkah',
        'bahan_id',
        'kategori_id',
        'image',
    ];
    public $timestamps = true;

    public function kategori(){
        return $this->BelongsTo(Kategori::class);
    }

    public function bahan(){
        return $this->BelongsTo(Bahan::class);
    }

    public function resep(){
        return $this->BelongsTo(Resep::class);
    }
}
