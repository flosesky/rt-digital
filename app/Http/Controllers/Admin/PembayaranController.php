<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Warga;
use App\Models\Iuran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with(['warga', 'iuran'])
            ->latest()
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::orderBy('nama_kepala_keluarga')->get();
        $iurans = Iuran::orderBy('tahun', 'desc')->get();

        return view('admin.pembayaran.create', compact('wargas', 'iurans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'iuran_id' => 'required|exists:iurans,id',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required',
            'status' => 'required',
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        if ($request->hasFile('bukti_pembayaran')) {

            $namaFile = time() . '.' .
                $request->bukti_pembayaran->extension();

            $request->bukti_pembayaran->move(
                public_path('uploads/bukti'),
                $namaFile
            );
        }

        Pembayaran::create([
            'warga_id' => $request->warga_id,
            'iuran_id' => $request->iuran_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => $request->status,
            'bukti_pembayaran' => $namaFile,
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $wargas = Warga::orderBy('nama_kepala_keluarga')->get();

        $iurans = Iuran::orderBy('tahun', 'desc')->get();

        return view(
            'admin.pembayaran.edit',
            compact('pembayaran', 'wargas', 'iurans')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'iuran_id' => 'required|exists:iurans,id',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required',
            'status' => 'required',
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $namaFile = $pembayaran->bukti_pembayaran;

        if ($request->hasFile('bukti_pembayaran')) {

            $namaFile = time() . '.' .
                $request->bukti_pembayaran->extension();

            $request->bukti_pembayaran->move(
                public_path('uploads/bukti'),
                $namaFile
            );
        }

        $pembayaran->update([
            'warga_id' => $request->warga_id,
            'iuran_id' => $request->iuran_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => $request->status,
            'bukti_pembayaran' => $namaFile,
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diubah.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}