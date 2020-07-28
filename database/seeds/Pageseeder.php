<?php

use App\Page;
use Illuminate\Database\Seeder;

class Pageseeder extends Seeder
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
                "name"=>"Home",
                "description" => "This is the homepage",
                "active" => true,
                "links" => [
                    [
                        "name" => "Facebook",
                        "web_address" => "https://www.facebook.com/"
                    ],
                    [
                        "name" => "YouTube",
                        "web_address" => "https://www.youtube.com/"
                    ],
                    [
                        "name" => "Instagram",
                        "web_address" => "https://www.instagram.com/"
                    ]
                ]
            ],
            [
                "name"=>"Photography",
                "description" => "This is the photography Page",
                "active" => true,
                "links" => []
            ]
            ,
            [
                "name"=>"Video",
                "description" => "Videos",
                "active" => true,
                "links" => []
            ],
            [
                "name"=>"Contact",
                "description" => "Contact us",
                "active" => true,
                "links" => []
            ]
        ];

        $super_user = \App\User::where('id',1)->first();

        foreach($arr_pages as $page)
        {
            $new_page = new Page();
            $new_page->name = $page["name"];
            $new_page->active = $page['active'];
            $new_page->description = $page['description'];
            $new_page->user()->associate($super_user);
            $new_page->generateReference();
            $new_page->generateAlias();
            $new_page->save();
        }
    }
}
