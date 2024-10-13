<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Repository\Kelompok\KelompokRepository;

class KelompokController extends Controller
{
    protected $kelompokRepository;

    public function __construct(KelompokRepository $kelompokRepository)
    {
        $this->kelompokRepository = $kelompokRepository;
    }

    public function index()
    {
        $kelompokData = $this->kelompokRepository->getPaginatedKelompok();
        return view('kelompok.kelompok', compact('kelompokData'));
    }

    public function create()
    {
        return view('kelompok.create'); // Pastikan view ini ada
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kategori' => 'required|string',
            'kelompok_barang' => 'required|string',
        ]);

        $this->kelompokRepository->store($validatedData);

        return redirect()->route('kelompok.index')->with('success', 'Kelompok berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelompok = $this->kelompokRepository->find($id);
        return view('kelompok.edit', compact('kelompok')); // Pastikan view ini ada
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_kategori' => 'required|string',
            'kelompok_barang' => 'required|string',
        ]);
    
        $kelompok = $this->kelompokRepository->find($id); // Pastikan Anda memiliki metode find di repository
        $kelompok->update($validatedData); // Pastikan model mendukung update
    
        return redirect()->route('kelompok.index')->with('success', 'Kelompok berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $this->kelompokRepository->delete($id);
        return redirect()->route('kelompok.index')->with('success', 'Kelompok berhasil dihapus.');
    }
}
