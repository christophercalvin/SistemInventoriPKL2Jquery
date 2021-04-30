<?php

use Illuminate\Database\Seeder;
use App\Models\M_status;

class M_statusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pending=[
            'nama'=> 'Pending',
        ];

        $complete=[
            'nama'=> 'Complete',
        ];
        

        if(!M_status::where('nama', $pending['nama'])->exists()){
            M_status::create($pending);
        }

        if(!M_status::where('nama', $complete['nama'])->exists()){
            M_status::create($complete);
        }
    }
}
