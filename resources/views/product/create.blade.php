@extends('template.index')
@section('title', 'Tambah Produk')
@section('halaman', 'Tambah Produk')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Nama Produk</label>
                            <input type="text" name="product_name" placeholder="Masukkan Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Kategori</label>
                            <select name="category" id="" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="product_harga" placeholder="Masukkan Harga" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="number" name="product_stock" placeholder="Masukkan Stock" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="image" placeholder="Masukkan Foto" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('produk') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                    <button class="btn btn-success float-right"><i class="fas fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
