<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'finish_date',
        'comment',
        'total_price',
        'car_id'
    ];

    public function carParts()
    {
        return $this->belongsToMany(CarPart::class);
    }

    public function cars()
    {
        return $this->belongsTo(Car::class,'carId');
    }

}
