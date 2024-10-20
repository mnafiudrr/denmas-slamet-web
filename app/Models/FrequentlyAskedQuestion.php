<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestion extends Model
{
    use HasFactory;

    protected $table = 'frequently_asked_questions';

    protected $fillable = [
        'question',
        'answer',
        'status',
        'position',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->position = FrequentlyAskedQuestion::count() + 1;
        });
    }
}
