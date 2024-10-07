<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TigaJ extends Model
{
    use HasFactory;

    protected $table = 'tigajs';

    protected $fillable = [
        'content',
    ];
}
