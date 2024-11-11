<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
     protected $fillable = [
        'nama_bahan'
    ];
    public $timestamps = true;

    public function resep(){
        return $this->hasMany(Resep::class);
    }
}
