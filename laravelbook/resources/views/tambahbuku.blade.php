@extends('layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('konten')
    <div class="container mt-4">
        <h1>{{ $judul }}</h1>
        <form action="{{ URL::to('buku') }}" enctype="multipart/form-data" method="post" id="applications"
            data-parsley-validate>
            @csrf
            <div class="mb-3 col-6">
                <label for="kodebuku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control @error('kodebuku') is-invalid
                @enderror" id="kodebuku" name="kodebuku" value="{{ old('kodebuku') }}">
                @error('kodebuku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control @error('judul') is-invalid
                @enderror" id="judul" name="judul" value="{{ old('judul') }}" aria-describedby="">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control @error('pengarang') is-invalid
                @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}" aria-describedby="">
                @error('pengarang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid
                @enderror" id="harga" name="harga" value="{{ old('harga') }}" aria-describedby="">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="idpenerbit" class="form-label">Penerbit</label>
                <select name="idpenerbit" id="idpenerbit" class="form-select @error('idpenerbit') is-invalid
                @enderror" aria-label="Default select example">
                    <option value="">--Pilih Penerbit--</option>
                    @foreach($datapenerbit as $item)
                        <option value="{{ $item->id }}" {{ $item->id == old('idpenerbit') ? 'selected' : '' }}>
                            {{ $item['namapenerbit'] }}
                        </option>
                    @endforeach
                </select>
                @error('idpenerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="gambar" class="form-label"> Foto </label>
                <input class="form-control @error('gambar') is-invalid 
                @enderror" type="file" name="gambar" id="gambar" value="{{ old('gambar') }}">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection