@extends('layouts.app')

@section('content')
    <h2>Login</h2>
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif
    <form method="POST" action="{{ route('login.action') }}">
        @csrf

        <div>
            <label for="name">Username</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <select id="role" name="role" required>
                <option value="warga">Warga</option>
                <option value="pakrt">Pak RT</option>
                <option value="pakrw">Pak RW</option>
                <option value="staffkelurahan">Staff Kelurahan</option>
            </select>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
