@extends('layouts.backoffice.master', ['title' => 'Tambah Barang'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="Tambah Barang" class="card-body">
                <form action="{{ route('backoffice.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input title="Nama Barang" name="name" type="text" placeholder="Masukan Nama Barang"
                        value="{{ old('name') }}" />
                    <div class="row">
                        <div class="col-6">
                            <x-input title="Gambar Barang" name="image" type="file" placeholder=""
                                value="{{ old('image') }}" />
                        </div>
                        <div class="col-6">
                            <x-input title="Satuan Barang" name="unit" type="text" placeholder="Masukan Satuan Barang"
                                value="{{ old('unit') }}" />
                        </div>
                        <div class="col-6">
                            <x-select title="Kategori" name="category_id">
                                <option value="" selected>Silahkan Pilih Kategori Barang</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-6">
                            <x-select title="Supplier" name="supplier_id">
                                <option value="" selected>Silahkan Pilih Supplier Barang</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-input title="Stok Awal" name="stok_awal" type="text" placeholder="Jumlah Stok Awal"
                                value="{{ old('stok_awal') }}" />
                        </div>
                        
                        <x-textarea title="Deskripsi Barang" name="description" placeholder="Masukan Deskripsi Barang" />
                    </div>
                    <a href="{{ route('backoffice.product.index') }}" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="11 7 6 12 11 17"></polyline>
                            <polyline points="17 7 12 12 17 17"></polyline>
                        </svg> Kembali
                    </a>
                    <x-button-save title="Simpan" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection