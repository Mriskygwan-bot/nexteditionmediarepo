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
        $super_admin_role = \App\Role::where('id',1)->first();

        $arr_users = [[
            "name" => "Super Admin",
            "email" => "admin@nexteditionmedia.com",
            "password" => "pcgsecretP@55"
        ]];

        foreach ($arr_users as $user)
        {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->generateReference();
            $new_user->generateAlias();
            $new_user->save();

            $new_user->roles()->attach($super_admin_role);
            $new_user->touch();
        }
    }
}
