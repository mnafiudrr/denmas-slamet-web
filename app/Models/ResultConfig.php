<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultConfig extends Model
{
    use HasFactory;

    protected $table = 'result_configs';

    protected $fillable = [
        'name',
        'description',
        'type',
        'min',
        'max',
    ];
}
