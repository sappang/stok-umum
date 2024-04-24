@extends('layouts.backoffice.master', ['title' => 'Role'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Role" url="{{ route('backoffice.role.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $i => $role)
                            <tr>
                                <td>{{ $i + $roles->firstItem() }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $roles->links() }}</div>
        </div>
         <div class="col-12 col-lg-4">
            <form action="{{ route('backoffice.role.store') }}" method="POST">
                @csrf
                <x-card title="Tambah Role" class="card-body">
                    <x-input title="Nama Role" name="name" type="text" placeholder="Masukan Nama Role"
                        value="{{ old('name') }}" />
                    <x-select-group title="Permission">
                        @foreach ($permissions as $permission)
                            <label class="form-selectgroup-item">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label">
                                    {{ $permission->name }}
                                </span>
                            </label>
                        @endforeach
                    </x-select-group>
                    <x-button-save title="Simpan" />
                </x-card>
            </form>
        </div>
    </x-container>
@endsection