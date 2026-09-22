@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Saran & Komplain</h3>
        <a href="{{ route('komplain.create') }}" class="btn btn-primary">+ Kirim Pesan</a>
    </div>

    <form method="GET" class="mb-3 d-flex gap-2">
        <select name="status" class="form-select w-auto" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="belum_ditindaklanjuti" {{ request('status') === 'belum_ditindaklanjuti' ? 'selected' : '' }}>Belum Ditindaklanjuti</option>
            <option value="sedang_ditindaklanjuti" {{ request('status') === 'sedang_ditindaklanjuti' ? 'selected' : '' }}>Sedang Ditindaklanjuti</option>
        </select>
    </form>

    <div class="row">
        @forelse ($komplains as $komplain)
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $komplain->nama }}</h5>
                            <span class="badge {{ $komplain->jenis === 'keluhan' ? 'bg-danger' : 'bg-info' }}">{{ ucfirst($komplain->jenis) }}</span>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $komplain->email }}</h6>
                        <p class="card-text">{{ Str::limit($komplain->isi_pesan, 100) }}</p>
                        <span class="badge {{ $komplain->status === 'sedang_ditindaklanjuti' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ str_replace('_', ' ', ucfirst($komplain->status)) }}
                        </span>
                        <div class="mt-2">
                            <a href="{{ route('komplain.show', $komplain) }}" class="btn btn-sm btn-outline-info">Lihat</a>
                            <a href="{{ route('komplain.edit', $komplain) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('komplain.destroy', $komplain) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada saran atau komplain yang masuk.</p>
        @endforelse
    </div>

    {{ $komplains->links() }}
@endsection