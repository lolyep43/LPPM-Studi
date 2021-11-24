<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuAjar extends Model
{
    protected $table = 'buku_ajar';
    protected $fillable = ['pengarang','penerbit','tahun','judul','deskripsi','gambar','slug'];
    protected $guarded = [];
}
