<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPengabdian extends Model
{
    protected $table = 'hasil_pengabdian';
    protected $fillable  = ['peneliti', 'judul', 'deskripsi', 'manfaat', 'foto', 'tahun', 'slug'];
    protected $guarded = [];
}
