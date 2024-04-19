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
        'lot_id',
        'warehouse',
        'project',
    ];

    public static function search($search)
    {
        return empty($search)
            ? self::query()
            : self::query()
            ->where('cvno', 'like', '%' . $search . '%')
            ->orWhere('lot_id', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function lot(){
        return $this->belongsTo(Lot::class);
    }
}
