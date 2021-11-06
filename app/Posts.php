<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable  = ['judul', 'konten', 'gambar', 'slug'];
    protected $guarded = [];
}
