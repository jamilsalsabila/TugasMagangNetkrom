@extends('layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('konten')
    <div class="container mt-4">
        <h1>{{ $judul }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $baris = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $baris++ }}</th>
                        <td>{{ $item["namapenerbit"] }}</td>
                        <td>{{ $item["alamat"] }}</td>
                        <td>{{ $item["kontak"] }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="basic example">

                                <a href="{{ url('penerbit/edit') }}/{{ $item["id"] }}"><button class="btn btn-primary btn-sm"
                                        type="button">Edit</button></a>
                                <form onsubmit="if(!confirm('mau menghapus data?')){return false;}"
                                    action="{{ url('penerbit') }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item["id"] }}">
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection