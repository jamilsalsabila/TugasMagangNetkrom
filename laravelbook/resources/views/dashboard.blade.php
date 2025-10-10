@extends('layout')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('konten')
    @php
        $who = '';
        if (Auth::check()) {
            $who = auth()->user()->isadmin ? "Admin" : auth()->user()->name;
        } else {
            $who = "Guest";
        }
    @endphp
    <div class="container mt-4">
        <h1>Selamat Datang, {{ $who }}</h1>
    </div>
@endsection