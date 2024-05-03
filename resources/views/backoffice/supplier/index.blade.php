@extends('layouts.backoffice.master', ['title' => 'Supplier'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Supplier" url="{{ route('backoffice.supplier.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>Telp Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $i => $supplier)
                            <tr>
                                <td>{{ $i + $suppliers->firstItem() }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>{{ $supplier->telp }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $suppliers->links() }}</div>
        </div>
    </x-container>
@endsection