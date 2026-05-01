<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $fillable = [
        'name',
        'position',
        'division',
        'photo',
        'instagram',
        'order',
    ];

    /**
     * Scope untuk mengurutkan berdasarkan kolom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope untuk mengelompokkan berdasarkan divisi
     */
    public function scopeByDivision($query, string $division)
    {
        return $query->where('division', $division);
    }
}
