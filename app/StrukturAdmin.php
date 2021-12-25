<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrukturAdmin extends Model
{
    protected $table = 'struktur_admin';
    protected $fillable = ['nama','jabatan','id_atasan'];
    protected $guarded = ['']; 
}
