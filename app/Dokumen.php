<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $fillable  = ['judul', 'file', 'slug'];
    protected $guarded = [];
}
