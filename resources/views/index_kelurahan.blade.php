@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Verifikasi</p>
    @foreach ($datas as $data)
        @if ($data->dokumen != null)
            <p>{{ $data->user_id }}</p>
            <p>{{ $data->nama }}</p>
            <p>{{ $data->alamat }}</p>
            <p>{{ $data->umur }}</p>
            <p>{{ $data->dokumen }}</p>
            <td>
                @if ($data->approved_kelurahan == 0)
                    <form action="{{ route('verify', $data->id) }}" method="POST">
                        @csrf
                        <button type="submit">Approve</button>
                    </form>
                @else
                    Sudah Diverifikasi
                @endif
            </td>
        @endif
    @endforeach
@endsection
