@extends('template.index')
@section('title', 'Edit Kategori')
@section('halaman', 'Edit Kategori')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.update', ['category' => $category]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">Nama Kategori</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="card-footer">
                    <a href="{{ route('kategori') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                    <button class="btn btn-success float-right"><i class="fas fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
