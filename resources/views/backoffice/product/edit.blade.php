@extends('layouts.backoffice.master', ['title' => 'Ubah Barang'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="Ubah Barang" class="card-body">
                <form action="{{ route('backoffice.product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input title="Nama Barang" name="name" type="text" placeholder="Masukan Nama Barang"
                        value="{{ $product->name }}" />
                    <div class="row">
                        <div class="col-6">
                            <x-input title="Gambar Barang" name="image" type="file" placeholder=""
                                value="{{ $product->image }}" />
                        </div>
                        <div class="col-6">
                            <x-input title="Satuan Barang" name="unit" type="text" placeholder="Masukan Satuan Barang"
                                value="{{ $product->unit }}" />
                        </div>
                        <div class="col-6">
                            <x-select title="Kategori" name="category_id">
                                <option value="" selected>Silahkan Pilih Kategori Barang</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-6">
                            <x-select title="Supplier" name="supplier_id">
                                <option value="" selected>Silahkan Pilih Supplier Barang</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @selected($product->supplier_id == $supplier->id)>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-input title="Stok Awal" name="stok_awal" type="text" placeholder="Jumlah Stok Awal"
                                value="{{ $product->stok_awal }}" />
                        </div>
                        <x-textarea title="Deskripsi Barang" name="description" placeholder="Masukan Deskripsi Barang">
                            {{ $product->description }}</x-textarea>
                    </div>
                    <x-button-save title="Simpan" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection