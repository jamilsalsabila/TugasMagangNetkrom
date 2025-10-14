@extends('../layouts/layout')

@section('title', $title)

@section('header')
    @include('../layouts/header')
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        @can('onlyadmin')
            <a href="{{ url('product/create') }}"><button class="btn btn-primary btn-md">Add Product</button></a>
        @endcan
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($data as $item)
                <div class="col">
                    <div class="card h-100">
                        @if ($item->foto)
                            <img src="{{ asset('/storage/images') }}/{{ $item->nama }}/{{ $item->foto }}" class="card-img-top">
                        @else
                            <img src="{{ asset('/storage/images') }}/No_Image_Available.jpg" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                        @can('onlyadmin')
                            <div class="row">
                                <div class="col">
                                    <a href="{{ url("product/edit/$item->id") }}"><button class="btn btn-primary btn-sm"> Edit
                                        </button></a>
                                </div>
                                <div class="col">
                                    <form onsubmit="if(!confirm('apakah anda yakin mau menghapus data ini?')){return false;}"
                                        action="{{ url('product') }}" data-parsley-validate id="application" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                                    </form>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>

@endsection

@section('footer')
    @include('../layouts/footer')
@endsection