@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Tambah Kategori</h4>

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        @include('admin.kategori.form')

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
