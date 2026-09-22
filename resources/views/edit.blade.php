@extends('layout')

@section('content')
    <h3>Edit Saran / Komplain</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('komplain.update', $komplain) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama', $komplain->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $komplain->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Pesan</label>
            <select id="jenis" name="jenis" class="form-select" required>
                <option value="saran" {{ old('jenis', $komplain->jenis) === 'saran' ? 'selected' : '' }}>Saran</option>
                <option value="keluhan" {{ old('jenis', $komplain->jenis) === 'keluhan' ? 'selected' : '' }}>Keluhan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="isi_pesan" class="form-label">Isi Pesan</label>
            <textarea id="isi_pesan" name="isi_pesan" rows="4" class="form-control" required>{{ old('isi_pesan', $komplain->isi_pesan) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="belum_ditindaklanjuti" {{ old('status', $komplain->status) === 'belum_ditindaklanjuti' ? 'selected' : '' }}>Belum Ditindaklanjuti</option>
                <option value="sedang_ditindaklanjuti" {{ old('status', $komplain->status) === 'sedang_ditindaklanjuti' ? 'selected' : '' }}>Sedang Ditindaklanjuti</option>
            </select>
        </div>
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('komplain.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection