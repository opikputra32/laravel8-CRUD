<!DOCTYPE html>
<html lang="en">
@extends('layout')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Edit Mahasiswa</h1>
                <hr>
                <form action="{{ route('mahasiswas.update') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $mahasiswa->id }}" name="id">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control" @error('nim') is-invalid @enderror
                            value="{{ old('nim') ?? $mahasiswa->nim }}">
                        @error('nim')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" @error('nama') is-invalid @enderror
                            value="{{ old('nama') ?? $mahasiswa->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" id="laki_laki" value="L"
                                    {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                    {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="Teknik Informatika"
                                {{ old('jurusan') ?? $mahasiswa->jurusan == 'Teknik Informatika' ? 'selected' : '' }}>
                                Teknik Informatika
                            </option>
                            <option value="Sistem Informasi"
                                {{ old('jurusan') ?? $mahasiswa->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>
                                Sistem Informasi
                            </option>
                            <option value="Ilmu Komputer"
                                {{ old('jurusan') ?? $mahasiswa->jurusan == 'Ilmu Komputer' ? 'selected' : '' }}>
                                Ilmu Komputer
                            </option>
                            <option value="Teknik Komputer"
                                {{ old('jurusan') ?? $mahasiswa->jurusan == 'Teknik Komputer' ? 'selected' : '' }}>
                                Teknik Komputer
                            </option>
                            <option value="Teknik Telekomunikasi"
                                {{ old('jurusan') ?? $mahasiswa->jurusan == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                                Teknik Telekomunikasi
                            </option>
                        </select>
                        @error('jurusan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"
                            rows="3">{{ $mahasiswa->alamat }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
