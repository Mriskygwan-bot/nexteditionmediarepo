<?php

use App\Role;
use App\Roletype;
use Illuminate\Database\Seeder;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_roletypes = [
          [
              "name" => "Super Admin"
          ],
            [
                "name" => "System Admin"
            ],
            [
                "name" => "Admin"
            ]
            ,
            [
                "name" => "Editor"
            ]
        ];

        foreach($arr_roletypes as $roletype)
        {
            $new_roletype = new Roletype();
            $new_roletype->name = $roletype['name'];
            $new_roletype->generateReference();
            $new_roletype->generateAlias();
            $new_roletype->save();
        }

        $arr_roles = [
            [
                "name"=>"Super Admin",
                "active" => true,
                "type"=>"super-admin"
            ],
            [
                "name"=>"Admin",
                "active" => true,
                "type"=>"admin2"
            ],
            [
                "name"=>"Editor",
                "active" => true,
                "type" => "editor"
            ]
        ];

        foreach($arr_roles as $role)
        {
            $roletype = Roletype::where('alias',$role['type'])->first();
            $new_role = new Role();
            $new_role->name = $role["name"];
            $new_role->active = $role['active'];
            $new_role->generateReference();
            $new_role->generateAlias();
            $new_role->roletype()->associate($roletype);
            $new_role->save();
        }
    }
}
