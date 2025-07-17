@extends('app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Anggota</h6>
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Telepon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Bergabung</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>{{ $val->address }}</td>
                                <td>{{ $val->date_join }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $val->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Edit user"> Edit </a>
                                    <form action="{{ route('users.destroy', $val->id) }}" method="POST"
                                       style="display:inline;">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Navigasi pagination --}}
                    <div class="mt-3">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection