<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Admin ASSEGAF',
            'role' => 'admin',
            'email' => 'admin@assegaf.com',
            'password' => bcrypt('admin_assegaf')
        ],[
            'name' => 'User ASSEGAF',
            'role' => 'user',
            'email' => 'user@assegaf.com',
            'password' => bcrypt('user_assegaf')
        ]];

        foreach($data as $dt){
            User::create($dt);
        }
    }
}
