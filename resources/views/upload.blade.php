@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br />
            @endforeach
        </div>
    @endif

    @if ($acc->count() > 0)
        <div class="row">
            <div class="container">
                <h2 class="text-center my-5">Silahkan upload berkas disini</h2>
                <div class="container">
                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <h6 class="mt3">Unggah Berkas</h6>
                            <input class="form-control" type="file" name="file">
                        </div>

                        <input type="submit" value="Upload" class="btn btn-primary mt-3 mb-3">
                    </form>
                    <a href="/">Back</a>
                </div>
            </div>
        </div>
        </div>
    @else
        <div class="row">
            <div class="container">
                <h2 class="text-center mt-5 mb-5">Sorry, data anda belum di verifikasi</h2>
            </div>
            <a href="/">Back</a>
        </div>
    @endif
@endsection
