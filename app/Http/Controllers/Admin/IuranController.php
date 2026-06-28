<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iurans = Iuran::latest()->get();

        return view('admin.iuran.index', compact('iurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.iuran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan'   => 'required',
            'tahun'   => 'required|integer',
            'nominal' => 'required|numeric',
        ]);

        Iuran::create([
            'bulan'   => $request->bulan,
            'tahun'   => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()
            ->route('iuran.index')
            ->with('success', 'Data iuran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('iuran.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iuran = Iuran::findOrFail($id);

        return view('admin.iuran.edit', compact('iuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan'   => 'required',
            'tahun'   => 'required|integer',
            'nominal' => 'required|numeric',
        ]);

        $iuran = Iuran::findOrFail($id);

        $iuran->update([
            'bulan'   => $request->bulan,
            'tahun'   => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()
            ->route('iuran.index')
            ->with('success', 'Data iuran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $iuran = Iuran::findOrFail($id);

        $iuran->delete();

        return redirect()
            ->route('iuran.index')
            ->with('success', 'Data iuran berhasil dihapus.');
    }
}