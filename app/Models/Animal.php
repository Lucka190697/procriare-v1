<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'born_date',
        'sex',
        'class',
        'breed',
        'status',
        'thumbnail',
        'mother',
        'father',
        'farm_id',
        'responsible_id'
    ];

    protected $dates = ['deleted_at'];

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id', 'id');
    }

    public function heats()
    {
        return $this->hasMany(AnimalHeat::class);
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }
}
