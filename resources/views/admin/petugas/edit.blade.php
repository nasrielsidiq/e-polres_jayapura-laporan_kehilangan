@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Edit Petugas</h4>

    <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
        @csrf @method('PUT')

        @include('admin.petugas.form')

        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
