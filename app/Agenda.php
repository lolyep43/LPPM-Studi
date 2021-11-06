<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable  = ['judul', 'konten', 'tanggal', 'jam', 'tempat', 'slug'];
    protected $guarded = [];
}
