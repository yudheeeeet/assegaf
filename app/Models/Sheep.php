<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sheep extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sheep';
    protected $fillable = [
        'sheet',
        'price',
        'grade','deleted_at'
    ];
}
