@extends('layout')

@section('content')

    <body>
        <div class="container mt-3">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="d-flex">
                        <h1 class="">Biodata {{ $mahasiswa->nama }}</h1>
                    </div>

                </div>
                <div class="col-2">
                    <div class="pt-2 mb-auto d-flex justify-content-around align-items-center">
                        <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}"
                            class="btn btn-primary">Edit</a>
                        <form action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
            <ul>
                <li>NIM : {{ $mahasiswa->nim }}</li>
                <li>Nama : {{ $mahasiswa->nama }}</li>
                <li>Jenis Kelamin : {{ $mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                <li>Jurusan : {{ $mahasiswa->jurusan }}</li>
                <li>Alamat : {{ $mahasiswa->alamat }}</li>
            </ul>
        </div>
    @endsection
