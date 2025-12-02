@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Edit Kategori</h4>

    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
        @csrf @method('PUT')

        @include('admin.kategori.form')

        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
