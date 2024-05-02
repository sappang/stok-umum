@extends('layouts.backoffice.master', ['title' => 'Kategori'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
        <x-card-action title="Daftar Kategori" url="{{route('backoffice.category.index')}}">
            <x-table>
            <thead>
                <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $i => $category)
                <tr>
                    <td>{{ $i + $categories->firstItem() }}</td>
                    <td>
                    <span class="avatar rounded avatar-md"
                    style="background-image: url({{ $category->image }})"></span>
                    </td>
                    <td>{{ $category->name }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            </x-table>
        </x-card-action>
        <div class="d-flex justify-content-end">{{ $categories->links() }}</div>
        </div>
    </x-container>
@endsection