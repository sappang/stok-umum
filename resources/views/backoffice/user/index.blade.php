@extends('layouts.backoffice.master', ['title' => 'User'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card-action title="Daftar user" url="{{ route('backoffice.user.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $i + $users->firstItem() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <x-button-delete id="{{ $user->id }}" title="Hapus Data"
                                        url="{{ route('backoffice.user.destroy', $user->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $users->links() }}</div>
        </div>
    </x-container>
@endsection