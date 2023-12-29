@extends('template.index')
@section('title', 'Edit Produk')
@section('halaman', 'Edit Produk')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Nama Produk</label>
                            <input type="text" name="product_name" value="{{ $product->name }}"
                                placeholder="Masukkan Nama Produk" class="form-control">
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
                            <input type="number" value="{{ $product->harga }}" name="product_harga"
                                placeholder="Masukkan Harga" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="number" value="{{ $product->stock }}" name="product_stock"
                                placeholder="Masukkan Stock" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" value="{{ $product->image }}" name="image" placeholder="Masukkan Foto"
                                class="form-control">
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
