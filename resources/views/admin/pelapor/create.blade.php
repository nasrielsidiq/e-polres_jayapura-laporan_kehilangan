@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Tambah Pelapor</h4>

    <form action="{{ route('admin.pelapor.store') }}" method="POST">
        @csrf

        @include('admin.pelapor.form')

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
