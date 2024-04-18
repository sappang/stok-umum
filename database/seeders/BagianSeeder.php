<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bagian = Bagian::create([
            'nama_bagian' => 'umum',
        ]);
    }
}
