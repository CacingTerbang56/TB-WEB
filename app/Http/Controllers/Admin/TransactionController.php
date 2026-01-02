<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['item', 'winner'])
            ->latest()
            ->get();

        return view('admin.transaksi', compact('transactions'));
    }

    public function processSingle(Item $item)
    {
        if ($item->transaction) {
            return back()->with('error', 'Barang ini sudah diproses menjadi transaksi.');
        }

        $highestBid = $item->bids()
            ->orderByDesc('bid_amount')
            ->first();

        if (! $highestBid) {
            return back()->with('error', 'Belum ada penawar untuk barang ini.');
        }

        DB::transaction(function () use ($item, $highestBid) {
            Transaction::create([
                'item_id'     => $item->id,
                'winner_id'   => $highestBid->user_id,
                'final_price' => $highestBid->bid_amount,
                'paid_at'     => now(),
            ]);

            $item->update([
                'current_price' => $highestBid->bid_amount,
                'status'        => 'terjual',
            ]);
        });

        return back()->with('success', 'Barang berhasil diproses. Pemenang ditentukan.');
    }
}
