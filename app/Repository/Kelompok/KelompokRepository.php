<?php
namespace App\Repository\Kelompok;

use App\Models\Kelompok;

class KelompokRepository
{
    public function getPaginatedKelompok()
    {
        return Kelompok::paginate(15);
    }

    public function store(array $data)
    {
        return Kelompok::create($data);
    }

    public function find($id)
    {
        return Kelompok::findOrFail($id); // Pastikan menggunakan findOrFail untuk menangani not found
    }
    

    public function update($id, array $data)
    {
        $kelompok = $this->find($id);
        $kelompok->update($data);
        return $kelompok;
    }

    public function delete($id)
    {
        $kelompok = $this->find($id);
        return $kelompok->delete();
    }
}
