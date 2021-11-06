<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable  = ['judul', 'konten', 'file', 'slug'];
    protected $guarded = [];
}
