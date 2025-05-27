@extends('dashboard.index')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @include('dashboard.users.form')
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
