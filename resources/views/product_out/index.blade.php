@extends('template.index')
@section('title', 'Produk Keluar')
@section('halaman', 'Produk Keluar')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Produk Keluar</h3>
            <a href="{{ route('produkOut.create') }}" class="btn btn-sm btn-primary float-right"><i
                    class="fas fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                {{-- <form action="{{ route('produkIn.edit', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-secondary"><i class="fas fa-pencil-alt"></i></button>
                                </form> --}}
                                <form action="{{ route('produkOut.delete', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
