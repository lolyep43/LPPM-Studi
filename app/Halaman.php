<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $table = 'halaman';
    protected $fillable  = ['judul', 'konten', 'slug'];
    protected $guarded = [];
}
