<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ButcherDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'butcher_detail';
    protected $fillable = [
        'butcher_id',
        'grade_id',
        'price',
        'deleted_at',
    ];
}
