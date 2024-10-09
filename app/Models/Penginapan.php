<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function galeries()
{
    return $this->hasMany(Galeri::class, 'penginapan_id');

    }
    
}
