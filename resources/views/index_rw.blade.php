@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


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
                        <form action="{{ route('pakrw.approve.doc', $data->id) }}" method="POST">
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
