@extends('template.index')
@section('title', 'Produk')
@section('halaman', 'Produk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Produk</h3>
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nama</th>
                        <th>Nama Kategori</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->harga }}</td>
                            <td><img src="{{ Storage::disk('public')->url($item->image) }}" alt="" width="100px"
                                    height="100px">
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <form action="{{ route('product.edit', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-secondary"><i class="fas fa-pencil-alt"></i></button>
                                </form>
                                <form action="{{ route('product.delete', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nama</th>
                        <th>Nama Kategori</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
