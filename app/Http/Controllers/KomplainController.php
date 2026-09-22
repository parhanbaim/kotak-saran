<?php

namespace App\Http\Controllers;

use App\Models\komplain;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = komplain::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $komplains = $query->paginate(10)->withQueryString();

        return view('index', compact('komplains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis' => 'required|in:saran,keluhan',
            'isi_pesan' => 'required|string',
        ]);

        komplain::create($validatedData);

        return redirect()->route('komplain.index')
            ->with('success', 'Terima kasih, komplain anda telah kami terima.');
    }

    /**
     * Display the specified resource.
     */
    public function show(komplain $komplain)
    {
        return view('show', compact('komplain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komplain $komplain)
    {
        return view('edit', compact('komplain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komplain $komplain)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis' => 'required|in:saran,keluhan',
            'isi_pesan' => 'required|string',
            'status' => 'required|in:belum_ditindaklanjuti,sedang_ditindaklanjuti',
        ]);

        $komplain->update($validated);
        return redirect()->route('komplain.index')
            ->with('success', 'Komplain berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(komplain $komplain)
    {
        $komplain->delete();
        return redirect()->route('komplain.index')
            ->with('success', 'Komplain berhasil dihapus.');
    }
}
