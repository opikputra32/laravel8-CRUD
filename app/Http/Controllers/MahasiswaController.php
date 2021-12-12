<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswas'=>$mahasiswa]);
    }

    public function create()
    {
        return view('form-pendaftaran');
    }

    public function edit(Mahasiswa $mahasiswa) {
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function show(Mahasiswa $mahasiswa) {
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa) {
        $validateData = $request->validate(
            [
                'nim' => 'required|size:8',
                'nama' => 'required|min:3|max:50',
                'jenis_kelamin' => 'required|in:P,L',
                'jurusan' => 'required',
                'alamat' => '',
            ],
        );

        Mahasiswa::where('id', $request->id)->update($validateData);
        // dd($mhsbaru);
        return redirect()->route('mahasiswas.show', ['mahasiswa' => $request->id])->with('pesan',"Update data {$validateData['nama']}");
        // return "Test";
    }
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('pesan', "Hapus data $mahasiswa->nama berhasil");
    }
    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                'nim' => 'required|size:8',
                'nama' => 'required|min:3|max:50',
                'jenis_kelamin' => 'required|in:P,L',
                'jurusan' => 'required',
                'alamat' => '',
            ],
        );

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $validateData['nim'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->jurusan = $validateData['jurusan'];
        $mahasiswa->alamat = $validateData['alamat'];
        $mahasiswa->save();

        // dump($validateData);
        return redirect()->route('mahasiswas.index')->with('pesan', "Update data berhasil");
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->name = $validateData['name'];
        // $mahasiswa->email = $validateData['email'];
        // $mahasiswa->save();

        // $msg = "Insert success!";
        // $mahasiswas = Mahasiswa::all();

        // return view('form-pendaftaran');
    }
}
