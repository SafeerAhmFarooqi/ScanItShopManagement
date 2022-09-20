<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalCustomer extends Model
{
    use HasFactory;

    protected $table = 'rental_customers';

    protected $fillable = ['area_id','floor_id','shop_id','name','phonenumber','advancepayment','cutoffpayment','note'];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
   
}
