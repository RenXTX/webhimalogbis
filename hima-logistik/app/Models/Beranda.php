<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'welcome_text',
        'hero_image',
        'is_active',
        'stat_anggota',
        'stat_kegiatan',
        'stat_divisi',
        'stat_periode',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk mengambil beranda yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
