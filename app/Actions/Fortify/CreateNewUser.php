<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'kd_pegawai' => ['required','max:17','unique'],
            'nik' => ['required','max:16','unique'],
        ])->validate();

        $role = Role::where('name', 'staff')->first();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'kd_pegawai' => $input['kd_pegawai'],
            'nik' => $input['nik'],
            'bagian_id' => 1,
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole($role);

        return  $user;
    }
}
