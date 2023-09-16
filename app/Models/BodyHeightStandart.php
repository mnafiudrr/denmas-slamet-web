<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyHeightStandart extends Model
{
    use HasFactory;

    protected $table = 'body_height_standarts';

    protected $fillable = [
        'gender',
        'age',
        'm3sd',
        'm2sd',
        'm1sd',
        'median',
        'p1sd',
        'p2sd',
        'p3sd',
    ];
}
