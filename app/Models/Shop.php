<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = ['area_id','floor_id','shopno','shopsize','shoprent','note'];

    public function rentalCustomer()
    {
        return $this->hasOne(RentalCustomer::class, 'shop_id');
    }
}
