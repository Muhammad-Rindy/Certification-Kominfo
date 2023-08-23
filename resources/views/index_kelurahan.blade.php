@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h2>Verification Document</h2>
        <hr>
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Document</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->user_id }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->umur }}</td>
                        <td>{{ $data->dokumen }}</td>
                        <td>
                            @if ($data->approved_kelurahan == 0)
                                <form action="{{ route('verify', $data->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Verifikasi</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-secondary" disabled>Sudah Diverifikasi</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
