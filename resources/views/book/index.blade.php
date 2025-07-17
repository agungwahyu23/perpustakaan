@extends('app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Buku</h6>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Tambah Data</a> --}}
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pengarang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Terbit</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $key => $val)
                            <tr>
                                <td>{{ $val->judul }}</td>
                                <td>{{ $val->pengarang }}</td>
                                <td>{{ $val->tahun_terbit }}</td>
                                <td>
                                    @if ($val->status == 'tersedia')
                                        <span class="badge badge-sm bg-gradient-success">Tersedia</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-danger">Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Navigasi pagination --}}
                    <div class="mt-3">
                        {{ $book->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection