@extends('layouts.app')

@section('content')
    <h2>Users Waiting for Approval Data</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
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
                            <button type="submit">Approve</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <h2>Users Waiting for Approval Document</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Alamat</th>
                <th>Umur</th>
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
                            <button type="submit">Approve</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
@endsection
