<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'location',
        'category',
        'image',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    /**
     * Scope untuk mengurutkan berdasarkan tanggal terbaru
     */
    public function scopeLatestEvent($query)
    {
        return $query->orderBy('event_date', 'desc');
    }

    /**
     * Accessor untuk format tanggal Indonesia
     */
    public function getFormattedDateAttribute(): string
    {
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return $this->event_date->day . ' ' . $months[$this->event_date->month] . ' ' . $this->event_date->year;
    }
}
