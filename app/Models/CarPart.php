<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'purchasePrice',
        'sellingPrice'
    ];

    public function serviceOrders()
    {
        return $this->belongsToMany(ServiceOrder::class);
    }
}
