<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user  = User::create(array(
            'name' => 'Yants Ismael',
            'email' => 'yants.ismael.csd@gmail.com',
            'password' => Hash::make('password'),
            'show_password' => 'password',
            'email_verified_at' => Carbon::now()
        ));
    }
}
