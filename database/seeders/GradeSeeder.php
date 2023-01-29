<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'grade' => 'BAIK'
        ],[
            'grade' => 'LOKAL'
        ],[
            'grade' => 'AFKIR'
        ],[
            'grade' => 'JANTAN'
        ],[
            'grade' => 'KULIT KEPALA'
        ]];

        foreach($data as $dt){
            Grade::create($dt);
        }
    }
}
