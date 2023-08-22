@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Anda sudah mengisi data sebelumnya.</p>
    <p>ID Pengguna: {{ $userId }}</p>
    <!-- Tambahkan informasi atau tautan ke halaman lain sesuai kebutuhan -->

    @if ($users->count() > 0)
        <div class="row">
            <div class="container">
                <h2 class="text-center my-5">Silahkan upload berkas disini</h2>

                <div class="col-lg-8 mx-auto my-5">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <b>File Gambar</b><br />
                            <input type="file" name="file">
                        </div>



                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if ($acc->count() > 0)
        <a href="{{ url('/print-lampiran') }}" target="_blank">Cetak Lampiran</a>
    @endif

@endsection
