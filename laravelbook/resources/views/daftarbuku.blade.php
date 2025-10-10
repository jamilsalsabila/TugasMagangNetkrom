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
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Penerbit</th>
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
                        <td>{{ $item["kodebuku"] }}</td>
                        <td>{{ $item["judul"] }}</td>
                        <td>{{ $item["pengarang"] }}</td>
                        <td>{{ $item["harga"] }}</td>
                        <td>{{ $item->penerbit->namapenerbit }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Gabungan tombol aksi">
                                <a href="{{ url('buku/edit') }}/{{ $item->id }}">
                                    <button class="btn btn-primary btn-sm" type="button">
                                        Edit
                                    </button>
                                </a>
                                @can('adminonly')
                                    <form action="{{ url('buku') }}" onsubmit="if(!confirm('Mau menghapus data?')){return false;}"
                                        method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>

@endsection