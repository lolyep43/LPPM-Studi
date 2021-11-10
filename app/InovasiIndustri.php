<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InovasiIndustri extends Model
{
    protected $table = 'inovasi_industri';
    protected $fillable  = ['judul', 'konten', 'gambar', 'slug'];
    protected $guarded = [];
}
