<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'profile_id',
        'health_id',
        'pregnancy_id',
        'created_by',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function health()
    {
        return $this->belongsTo(Health::class);
    }

    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
