<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deskripsiFokus extends Model
{
    protected $table = 'deskripsi_fokus_riset';
    protected $fillable  = ['deskripsi','judul'];
    protected $guarded = [];
}
