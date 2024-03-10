<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'cvno',
        'address',
        'area',
        'warehouse',
        'project',
    ];

    public static function search($search)
    {
        return empty($search)
            ? self::query()
            : self::query()
            ->where('cvno', 'like', '%' . $search . '%')
            ->orWhere('area', 'like', '%' . $search . '%');
    }
}
