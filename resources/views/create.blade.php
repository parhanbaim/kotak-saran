@extends('layout')

@section('content')
    <h3>Kirim Saran / Komplain</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('komplain.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Pesan</label>
            <select id="jenis" name="jenis" class="form-select" required>
                <option value="saran" {{ old('jenis', 'saran') === 'saran' ? 'selected' : '' }}>Saran</option>
                <option value="keluhan" {{ old('jenis') === 'keluhan' ? 'selected' : '' }}>Keluhan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="isi_pesan" class="form-label">Isi Pesan</label>
            <textarea id="isi_pesan" name="isi_pesan" class="form-control" rows="4" required>{{ old('isi_pesan') }}</textarea>
        </div>
        <button class="btn btn-primary">Kirim</button>
        <a href="{{ route('komplain.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection