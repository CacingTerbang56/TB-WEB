<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('item')
            ->where('winner_id', Auth::id())
            ->latest()
            ->get();
        return view('user.transaksi', compact('transactions'));
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
        $transaction = Transaction::create([
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

    return back()->with('success', 'Barang berhasil diproses dan dinyatakan terjual.');
}

}
