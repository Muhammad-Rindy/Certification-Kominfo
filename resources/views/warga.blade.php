@extends('layouts.app')

@section('content')
    <h2>Warga Form</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
