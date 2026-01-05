<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang      = Item::count();
        $totalPeserta     = User::where('role','user')->count();
        $totalTransaksi   = Transaction::count();
        $items            = Item::latest()->get();

        return view('admin.dashboard', compact(
            'totalBarang',
            'totalPeserta',
            'totalTransaksi',
            'items'
        ));
    }
}

