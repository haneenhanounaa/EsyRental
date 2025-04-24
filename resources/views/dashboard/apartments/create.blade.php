@extends('dashboard.index')

@section('content')
    <div class="container">
        <h2>Add Apartment</h2>
        <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('dashboard.apartments.form')
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
