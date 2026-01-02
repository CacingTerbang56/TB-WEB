<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::where(function ($q) {
                $q->whereNull('start_time')->orWhere('start_time', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_time')->orWhere('end_time', '>=', now());
            })
            ->latest()
            ->get();

        return view('user.dashboard', compact('items'));
    }
}

