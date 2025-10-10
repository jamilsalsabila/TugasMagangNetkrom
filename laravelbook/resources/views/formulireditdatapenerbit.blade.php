@extends('layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('konten')
    <div class="container mt-4">
        <h1>{{ $judul }}</h1>
        <form action="{{ url('penerbit') }}" method="post" id="applications" data-parsley-validate>
            @method('patch')
            @csrf
            <div class="mb-3 col-6">
                <label for="namapenerbit" class="form-label">Nama Penerbit</label>
                <input type="text" class="form-control" id="namapenerbit" name="namapenerbit"
                    value="{{ $data->namapenerbit }}">
                <input type="hidden" name="id" value="{{ $data->id }}" </div>
                <div class="mb-3 col-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}"
                        aria-describedby="">
                </div>
                <div class="mb-3 col-6">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $data->kontak }}"
                        aria-describedby="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection