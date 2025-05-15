@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Profil</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-center">
                        <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0D8ABC&color=fff' }}" class="rounded-circle mb-2" width="100" height="100" alt="Foto Profil">
                    </div>
                    <div class="mb-3">
                        <label>Foto Profil (opsional)</label>
                        <input type="file" name="profile_photo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label>Password Baru <small>(Opsional)</small></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 