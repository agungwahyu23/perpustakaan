@extends('app')

@section('content')
<form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kode" class="text-white">Kode Transaksi:</label>
                <input type="text" value="{{ $kode }}" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Masukkan Kode" readonly>
                @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="user_id" class="text-white">Nama Peminjam:*</label>
                <select name="user_id" id="user_id" class="form-control form-select" required>
                    <option value="">Pilih Nama Peminjam</option>
                    @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="book_id" class="text-white">Judul Buku:*</label>
                <select name="book_id" id="book_id" class="form-control form-select" required>
                    <option value="">Pilih Buku</option>
                    @foreach ($book as $item)
                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
                @error('book_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('users.index') }}" class="btn btn-warning">Kembali</a>
</form>
@endsection