<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'role' => 'admin',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
        ]);
        $user->save();
        // $user = new User([
        //     'name' => 'Test Organization Leader',
        //     'email' => 'test1@test.com',
        //     'role' => 'user',
        //     'organization_id' => 1,
        //     'password' => password_hash('1234', PASSWORD_BCRYPT),
        // ]);
        // $user->save();
    }
}
