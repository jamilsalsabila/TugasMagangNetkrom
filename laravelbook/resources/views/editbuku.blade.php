@extends('layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('konten')
    <div class="container mt-4">
        <h1>{{ $judul }}</h1>
        <form action="{{ url('buku') }}" method="post" id="applications" data-parsley-validate>
            @method('patch')
            @csrf
            <div class="mb-3 col-6">
                <label for="kodebuku" class="form-label">Kode Buku</label>
                <h3 id="kodebuku">{{ $data->kodebuku }}</h3>
                <input type="hidden" name="kodebuku" value="{{ $data->kodebuku }}">
                <input type="hidden" name="id" value="{{ $data->id }}">
            </div>
            <div class="mb-3 col-6">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid
                @enderror" id="judul" name="judul" value="{{ old('judul', $data->judul) }}" aria-describedby="">
                @error('judul')
                    <div class="invalid-feedback">{{  $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control @error('pengarang') is-invalid
                @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $data->pengarang) }}"
                    aria-describedby="">
                @error('pengarang')
                    <div class="invalid-feedback">{{  $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid
                @enderror" id="harga" name="harga" value="{{ old('harga', $data->harga) }}" aria-describedby="">
                @error('harga')
                    <div class="invalid-feedback">{{  $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="penerbit" class="form-label @error('idpenerbit') is-invalid
                @enderror">Penerbit</label>
                <select class="form-select" name="idpenerbit" id="idpenerbit">
                    @foreach ($daftarpenerbit as $item)
                        <option value="{{ $item->id }}" {{ old('idpenerbit', $item->id == $data->idpenerbit ? 'selected' : '') }}>
                            {{ $item->namapenerbit }}
                        </option>
                    @endforeach
                </select>
                @error('idpenerbit')
                    <div class="invalid-feedback">{{  $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection