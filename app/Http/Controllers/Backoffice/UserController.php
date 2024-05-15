<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\User;
use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')
            ->search('name')
            ->paginate(10);

        $roles = Role::get();

        return view('backoffice.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $bagians = Bagian::all();

        return view('backoffice.user.register', compact('bagians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'kd_pegawai' => ['required','max:17','unique:users'],
            'nik' => ['required','max:16','unique:users'],
            'bagian_id' => ['required'],
        ]);
        

        $role = Role::where('name', 'staff')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kd_pegawai' => $request->kd_pegawai,
            'nik' => $request->nik,
            'bagian_id' => $request->bagian_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($role);

        return redirect(route('backoffice.user.index'))->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles);

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
