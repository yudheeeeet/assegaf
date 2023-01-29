<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'item' => 'Leather',
            'grade' => 'Baik',
            'sheet' => 0,
            'kilos' => 0
        ],[
            'item' => 'Leather',
            'grade' => 'Lokal',
            'sheet' => 0,
            'kilos' => 0
        ],[
            'item' => 'Leather',
            'grade' => 'Afkir',
            'sheet' => 0,
            'kilos' => 0
        ],[
            'item' => 'Leather',
            'grade' => 'Jantan',
            'sheet' => 0,
            'kilos' => 0
        ]];

        foreach($data as $dt){
            Storage::create($dt);
        }
    }
}
