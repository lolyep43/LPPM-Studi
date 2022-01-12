<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPenelitian extends Model
{
    protected $table = 'hasil_penelitian';
    protected $fillable  = ['peneliti', 'judul', 'fokus_riset', 'deskripsi',  'manfaat', 'foto', 'tahun', 'slug','slug2'];
    protected $guarded = [];
}
