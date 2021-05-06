<?php

use Illuminate\Database\Seeder;
use App\Models\PenanggungJawab;

class PenanggungJawabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser=[
            'nama'=> 'Admin',
            'no_telp'=> '08xxxxx',
            'alamat'=> 'jl. admin',
            'email'=>'admin@gmail.com',
        ];

        if(!PenanggungJawab::where('nama', $adminUser['nama'])->exists()){
            PenanggungJawab::create($adminUser);
        }
    }
}
