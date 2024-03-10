<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $table = 'lot';
    protected $fillable = [
        'area',
        'tct',
    ];

    public static function search($search)
    {
        return empty($search)
            ? self::query()
            : self::query()
            ->where('area', 'like', '%' . $search . '%')
            ->orWhere('tct', 'like', '%' . $search . '%');
    }
}
