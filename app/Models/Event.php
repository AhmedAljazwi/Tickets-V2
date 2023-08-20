<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'person_name',
        'phone',
        'location',
        'code',
        'price',
        'date',
        'time',
        'city_id',
        'type_id',
        'quantity',
    ];
    
    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
