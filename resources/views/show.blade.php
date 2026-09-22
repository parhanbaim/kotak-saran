@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4>{{ $komplain->nama }}</h4>
                <span class="badge {{ $komplain->jenis === 'keluhan' ? 'bg-danger' : 'bg-info' }}">{{ ucfirst($komplain->jenis) }}</span>
            </div>
            <p class="text-muted">{{ $komplain->email }}</p>
            <p>{{ $komplain->isi_pesan }}</p>
            <span class="badge {{ $komplain->status === 'sedang_ditindaklanjuti' ? 'bg-success' : 'bg-warning text-dark' }}">
                {{ str_replace('_', ' ', ucfirst($komplain->status)) }}
            </span>
            <br>
            <small class="text-muted">Dikirim: {{ $komplain->created_at->format('d M Y, H:i') }}</small>
        </div>
    </div>
    <a href="{{ route('komplain.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection