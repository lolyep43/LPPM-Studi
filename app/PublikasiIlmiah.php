<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublikasiIlmiah extends Model
{
    protected $table = 'publikasi_ilmiah';
    protected $fillable  = ['peneliti', 'judul', 'fokus_riset', 'deskripsi',  'manfaat', 'foto', 'tahun', 'slug'];
    protected $guarded = [];
}
