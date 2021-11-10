<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InovasiMandiri extends Model
{
    protected $table = 'inovasi_mandiri';
    protected $fillable  = ['judul', 'konten', 'gambar', 'slug'];
    protected $guarded = [];
}
