@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1>Warga Form</h1>
        <hr>
        <form method="POST" action="{{ route('warga.submit_form') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <!-- Add more form fields as needed -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <!-- Add more form fields as needed -->
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" name="umur" id="umur" class="form-control">
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        <a href="{{ route('form.already_filled', ['userId' => $user->id]) }}">Halaman Upload Dokumen</a>
    </div>
@endsection
