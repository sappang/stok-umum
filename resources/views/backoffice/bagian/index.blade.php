@extends('layouts.backoffice.master', ['title' => 'Bagian'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Bagian" url="{{ route('backoffice.bagian.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bagians as $i => $bagian)
                            <tr>
                                <td>{{ $i + $bagians->firstItem() }}</td>
                                <td>{{ $bagian->nama_bagian }}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $bagians->links() }}</div>
        </div>
        <div class="col-12 col-lg-4">
            <form action="{{ route('backoffice.bagian.store') }}" method="POST">
                @csrf
                <x-card title="Tambah Bagian" class="card-body">
                    <x-input title="Nama Bagian" name="nama_bagian" type="text" placeholder="Masukan Nama Bagian"
                        value="{{ old('nama_bagian') }}" />
                    <x-button-save title="Simpan" />
                </x-card>
            </form>
        </div>
    </x-container>
@endsection