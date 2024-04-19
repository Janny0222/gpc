<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";
    protected $fillable = [
        'code_id',
        'company_name',
        'owners_name',
        'tin',
        'address',
    ];

    public static function search($search)
    {
        return empty($search)
            ? self::query()
            : self::query()
            ->where('code_id', 'like', '%' . $search . '%')
            ->orWhere('company_name', 'like', '%' . $search . '%')
            ->orWhere('owners_name', 'like', '%' . $search . '%')
            ->orWhere('tin', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%');
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function code() {
        return $this->belongsTo(CV::class);
    }
}
