<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';
    protected $fillable = ['nama','jabatan', 'level', 'parent'];
    protected $guarded = ['']; 

    /**
     * Get the user associated with the StrukturOrganisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Parent()
    {
        return $this->hasOne(StrukturOrganisasi::class, 'id', 'parent');
    }

    /**
     * Get all of the child for the StrukturOrganisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(StrukturOrganisasi::class, 'parent', 'id');
    }
}
