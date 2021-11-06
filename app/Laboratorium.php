<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';
    protected $fillable  = ['nama_laboratorium', 'deskripsi', 'foto', 'slug'];
    protected $guarded = [];
}
