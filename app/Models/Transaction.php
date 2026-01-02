<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['item_id', 'winner_id', 'final_price', 'paid_at'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}

