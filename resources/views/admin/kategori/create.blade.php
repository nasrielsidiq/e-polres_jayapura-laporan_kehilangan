@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Tambah Petugas</h4>

    <form action="{{ route('admin.petugas.store') }}" method="POST">
        @csrf

        @include('admin.petugas.form')

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
