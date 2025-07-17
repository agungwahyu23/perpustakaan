@extends('app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Transaksi</h6>
                <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Transaksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Peminjam</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key => $val)
                            <tr>
                                <td>{{ $val->kode }}</td>
                                <td>{{ $val->user->name }}</td>
                                <td>{{ $val->book->judul }}</td>
                                {{-- <td>
                                    <a href="{{ route('transactions.edit', $val->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Edit user"> Detail </a>
                                    <form action="{{ route('transactions.destroy', $val->id) }}" method="POST"
                                       style="display:inline;">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Navigasi pagination --}}
                    <div class="mt-3">
                        {{ $transactions->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection