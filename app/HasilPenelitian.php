<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPenelitian extends Model
{
    protected $table = 'hasil_penelitian';
    protected $fillable  = ['peneliti', 'judul', 'deskripsi', 'manfaat', 'foto', 'tahun', 'slug'];
    protected $guarded = [];
}
