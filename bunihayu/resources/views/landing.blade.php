@extends('layouts.layout')

@section('title', $title)


@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start" id="hero">
                <h1>Welcome To Bunihayu Forest</h1>
                <h3>Temukan destinasi wisata terbaik disini 🏞 </h3>
            </div>
            <div class="col align-self-center" id="produk">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th class="text-start" scope="col">Product Name</th>
                            <th class="text-start" scope="col">Price</th>
                            <th class="text-start" scope="col">Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $baris = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $baris++ }}</th>
                                <td class="text-start">{{ $item->nama }}</td>
                                <td class="text-start">Rp. {{ number_format($item->harga, 2) }}</td>
                                <td class="text-start">
                                    <a
                                        href="https://api.whatsapp.com/send?phone=6282320151391&text='Halo%20👋,%20saya%20ingin%20booking%20{{ $item->nama }},%20apakah%20masih%20tersedia?%20'"><button
                                            class="btn btn-primary btn-md m-5">Pesan Sekarang!</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection