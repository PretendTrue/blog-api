<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(100)->make();

        $user = $users->first();
        $user->name = 'super';
        $user->email = 'super@example.com';
        $user->password = bcrypt('secret');

        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
    }
}