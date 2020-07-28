<?php

use App\Linktype;
use Illuminate\Database\Seeder;

class Linktypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_pages = [
            [
                "name"=>"Social",
            ],
            [
                "name"=>"Internal",
            ]
        ];

        foreach($arr_pages as $page)
        {
            $new_linktype = new Linktype();
            $new_linktype->name = $page["name"];
            $new_linktype->generateReference();
            $new_linktype->generateAlias();
            $new_linktype->save();
        }
    }
}
