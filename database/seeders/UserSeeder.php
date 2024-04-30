<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [

                 'email'=>'admin@mail.com',
                 'name'=>'Admin',
                 'password'=>bcrypt('password'),
                 'fk_role_id'=>1,
              ];

        User::create($data);

         
    }
}
