<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leather extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leather';
    protected $fillable = [
        'butcher_id',
        'sheet',
        'kilos',
        'total_price',
        'deleted_at'
    ];
}
