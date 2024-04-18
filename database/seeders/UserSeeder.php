<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'),
            'nik'=>'200910',
            'kd_pegawai'=>'200910',
            'bagian_id'=>1,
            
        ]);

        $permissions = Permission::all();

        $role = Role::find(1);

        $role->syncPermissions($permissions);

        $user->assignRole($role);
    }
}
