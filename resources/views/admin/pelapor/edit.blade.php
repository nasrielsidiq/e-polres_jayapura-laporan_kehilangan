@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Edit Pelapor</h4>

    <form action="{{ route('admin.pelapor.update', ['pelapor' => $pelapor->id]) }}" method="POST">
        @csrf @method('PUT')

        @include('admin.pelapor.form')

        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
