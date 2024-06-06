@extends('layouts.backoffice.master', ['title' => 'Laporan'])

@section('content')
    <x-container>
        @role('admin')
            <div class="col-6 col-lg-3">
                <a href="{{ route('backoffice.report.reportbm') }}">
                    <x-widget title="Laporan Barang Masuk" subtitle="" class="bg-azure">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </x-widget>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <x-widget title="Laporan Barang Keluar" subtitle="" class="bg-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                        <line x1="3" y1="9" x2="7" y2="9"></line>
                    </svg>
                </x-widget>
            </div>
            <div class="col-6 col-lg-3">
                <x-widget title="Laporan Stok Tertinggal" subtitle="" class="bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                        <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                        <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                    </svg>
                </x-widget>
            </div>
        @endrole
    </x-container>
@endsection