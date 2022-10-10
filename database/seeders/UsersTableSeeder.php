<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert([
            0 =>
                [
                    'created_at' => Carbon::now(),
                    'email' => 'ahmadnazem2010@gmail.com',
                    'id' => 1,
                    'name' => 'Ahmad',
                    'username' => 'ahmad',
                    'password' => '$2y$10$HhjuYSw9GgxAO7HhK9rGYusMUUpyMzTZNnGQc1g75wMvKOmaV3XF2', // ChatDemo123!
                    'updated_at' => Carbon::now(),
                ],
            1 =>
                [
                    'created_at' => Carbon::now(),
                    'email' => 'ahmadnazem@hotmail.com',
                    'id' => 2,
                    'name' => 'Nazem',
                    'username' => 'nazem',
                    'password' => '$2y$10$P8LSpUC0BuVjnW6QXL8iJ.Z81X2TjpR5jd85VAUdegbam/AsbOYVG', // ChatDemo123!
                    'updated_at' => Carbon::now(),
                ],
        ]);

    }
}
