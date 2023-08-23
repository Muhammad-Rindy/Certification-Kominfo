@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mb-5">

        <h2>Users Waiting for Approval Account</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('pakrt.approve', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <hr>
    <div class="container mt-5">

        <h2>Users Waiting for Approval Document</h2>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->umur }}</td>
                        <td>
                            <form action="{{ route('pakrt.approve.doc', $data->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary" class="btn btn-light" type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
