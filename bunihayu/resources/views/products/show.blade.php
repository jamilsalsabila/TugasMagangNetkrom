@extends('../layouts/layout')

@section('title', $title)

@section('header')
    @include('../layouts/header')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                {{ $data->nama }}
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                {{ $data->deskripsi }}
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                {{ $data->harga }}
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                {{ $data->kapasitas }}
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                {{ $data->fasilitas }}
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-md-center">
                @if ($data->foto)
                    <img src="{{ asset("storage/images/$data->nama/$data->foto") }}" alt="" height="200">
                @else
                    <img src="{{ asset("storage/images/No_Image_Available.jpg") }}" alt="" height="200">
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('../layouts/footer')
@endsection