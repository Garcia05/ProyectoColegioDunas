<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_a = new User();
        //$user_a->id = 1;
        $user_a->name = 'Administrador';
        $user_a->email = 'admin@dunas.com';
        $user_a->password = Hash::make('12345678');
        $user_a->is_admin = true;
        $user_a->save();
        $user_a->roles()->attach(Role::where('name', 'admin')->first());
        $user_a->save();
    }
}
