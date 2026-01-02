<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function store(Request $request, Item $item)
    {
        $request->validate([
            'bid_amount' => 'required|integer|min:1',
        ]);

        if ($item->start_time && now()->lt($item->start_time)) {
            return back()->with('error', 'Lelang belum dimulai.');
        }

        if ($item->end_time && now()->gt($item->end_time)) {
            return back()->with('error', 'Lelang sudah berakhir.');
        }

        $current = $item->current_price ?? $item->start_price;

        if ($request->bid_amount <= $current) {
            return back()->with('error', 'Tawaran harus lebih tinggi dari harga saat ini.');
        }

        Bid::create([
            'user_id'    => Auth::id(),
            'item_id'    => $item->id,
            'bid_amount' => $request->bid_amount,
        ]);

        $item->update(['current_price' => $request->bid_amount]);

        return back()->with('success', 'Tawaran berhasil dikirim.');
    }
}

