<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
        protected $fillable = [
            'name',
            'description',
            'start_price',
            'current_price',
            'status',        
            'image',
            'start_time',
            'end_time',
        ];


    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
