@extends('template.index')
@section('title', 'Tambah Produk Masuk')
@section('halaman', 'Tambah Produk Masuk')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('produkIn.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputName">Nama Produk</label>
                            <select name="product_in" id="" class="form-control">
                                @foreach ($productIn as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputName">Qty</label>
                            <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah produk">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('produkIn') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                    <button class="btn btn-success float-right"><i class="fas fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
