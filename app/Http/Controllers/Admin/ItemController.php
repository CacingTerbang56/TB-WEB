<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['bids.user'])->withCount('bids')->latest()->get();
        return view('admin.barang', compact('items'));
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_price' => 'required|integer|min:0',
            'image'       => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('items', 'public');
        }

        $validated['current_price'] = $validated['start_price'];

        Item::create($validated);

        return redirect()->route('admin.barang')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_price' => 'required|integer|min:0',
            'image'       => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('items', 'public');
        }

        $item->update($validated);

        return redirect()->route('admin.barang')
            ->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('admin.barang')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
