@extends('layouts.backoffice.master', ['title' => 'Tambah User - Stok Umum'])

@section('content')
    <x-container>
        <div class="col-12">
            <form class="card card-md border-0 rounded-3" action="{{ route('backoffice.user.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h3 class="text-center mb-3 font-weight-medium">
                        Register
                    </h3>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="masukan name anda"
                            name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="masukan email anda" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIP/KodePegawai</label>
                        <input type="text" class="form-control @error('kd_pegawai') is-invalid @enderror"
                            placeholder="masukan kode pegawai anda" name="kd_pegawai">
                        @error('kd_pegawai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                            placeholder="masukan no KTP anda" name="nik">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <x-select title="Bagian" name="bagian_id">
                                <option value="" selected>Silahkan Pilih Bagian</option>
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}" @selected(old('bagian_id') == $bagian->id)>
                                        {{ $bagian->nama_bagian }}
                                    </option>
                                @endforeach
                            </x-select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="masukan kata sandi anda" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="masukan konfirmasi kata sandi anda" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
@endsection