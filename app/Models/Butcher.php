<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Butcher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'butcher';
    protected $fillable = [
        'name','deleted_at'
    ];
}
