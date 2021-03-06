<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable  = ['judul', 'gambar', 'slug'];
    protected $guarded = [];
}
