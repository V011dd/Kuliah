<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
        public function index()
    {
        $data = Mahasiswa::all();

        return view('mahasiswa.index', [
            'mahasiswa' => $data
        ]);
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

     public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'    => 'required',
            'nim'     => 'required|unique:mahasiswas',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/mahasiswa')->with('sukses', 'Data berhasil ditambahkan!');
    }

     public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', ['mhs' => $mhs]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'nim'     => 'required|unique:mahasiswas,nim,' . $id,
            'jurusan' => 'required',
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diupdate!');
    }

    public function destroy($id)
{
    $mhs = Mahasiswa::findOrFail($id);
    $mhs->delete();

    return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus!');
}
}
