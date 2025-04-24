@extends('dashboard.index')

@section('content')
    <div class="container">
        <h2>Edit Apartment</h2>
        <form action="{{ route('apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dashboard.apartments.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
