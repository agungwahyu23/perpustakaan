@extends('app')

@section('content')
<form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="text-white">Nama:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama" value="{{ $users->name }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="text-white">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Nama" value="{{ $users->email }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="text-white">Nomor Telepon:</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" value="{{ $users->phone }}">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_join" class="text-white">Tanggal Gabung:</label>
                <input type="date" class="form-control @error('date_join') is-invalid @enderror" id="date_join" name="date_join" value="{{ $users->date_join }}">
                @error('date_join') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address" class="text-white">Alamat:</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror">{{ $users->address }}</textarea>
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('users.index') }}" class="btn btn-warning">Kembali</a>
</form>
@endsection