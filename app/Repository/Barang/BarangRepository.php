<?php
namespace App\Repository\Barang;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Kelompok;
use App\Models\Perusahaan;

class BarangRepository
{
    public function index()
    {
        return Barang::with(['kategori', 'kelompok'])->paginate(15);
    }

    public function store($validatedData)
    {
        // Tambahkan barang baru
        $stokDefault = 0;
        $hargaJualDefault = $validatedData['harga_beli'] * 1.1;

        Barang::create([
            'nama_barang' => $validatedData['nama_barang'],
            'user_id' => auth()->id(),
            'satuan' => $validatedData['satuan'],
            'kategori_id' => $validatedData['kategori'], // Pastikan ini sesuai dengan kolom di database
            'kelompok_id' => $validatedData['kelompok'], // Pastikan ini sesuai dengan kolom di database
            'harga_beli' => $validatedData['harga_beli'],
            'perusahaan_id' => $validatedData['perusahaan'], // Pastikan ini sesuai dengan kolom di database
            'stok' => $stokDefault,
            'harga_jual' => $hargaJualDefault,
        ]);
    }

    public function edit($id)
    {
        return Barang::with(['kategori', 'kelompok'])->findOrFail($id);
    }

    public function update($id, $validatedData)
    {
        try {
            $data = Barang::findOrFail($id);
            $validatedData['harga_jual'] = $validatedData['harga_beli'] * 1.1;
    
            $data->update($validatedData);
    
            return response()->json(['success' => 'Barang berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui barang: ' . $e->getMessage()], 400);
        }
    }
    

    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
    }
}
