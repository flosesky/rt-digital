<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::latest()->get();

        return view('admin.warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'alamat'               => 'required',
            'nomor_rumah'          => 'required',
            'nomor_hp'             => 'required',
        ]);

        $jumlahWarga = User::where('role', 'warga')->count() + 1;

        $username = 'WRG' . str_pad($jumlahWarga, 5, '0', STR_PAD_LEFT);

        $user = User::create([
            'username' => $username,
            'name'     => $request->nama_kepala_keluarga,
            'email'    => $username . '@rtdigital.local',
            'password' => Hash::make('12345678'),
            'role'     => 'warga',
        ]);

        Warga::create([
            'user_id'              => $user->id,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat'               => $request->alamat,
            'nomor_rumah'          => $request->nomor_rumah,
            'nomor_hp'             => $request->nomor_hp,
        ]);

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('warga.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warga = Warga::findOrFail($id);

        return view('admin.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'alamat'               => 'required',
            'nomor_rumah'          => 'required',
            'nomor_hp'             => 'required',
        ]);

        $warga = Warga::findOrFail($id);

        $warga->update([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat'               => $request->alamat,
            'nomor_rumah'          => $request->nomor_rumah,
            'nomor_hp'             => $request->nomor_hp,
        ]);

        if ($warga->user) {
            $warga->user->update([
                'name' => $request->nama_kepala_keluarga,
            ]);
        }

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = Warga::findOrFail($id);

        if ($warga->user) {
            $warga->user->delete();
        }

        $warga->delete();

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}