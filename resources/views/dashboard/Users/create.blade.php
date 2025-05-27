@extends('dashboard.index')

@section('content')
    <div class="container">
        <h2>Add New User</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @include('dashboard.users.form')
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
@endsection
