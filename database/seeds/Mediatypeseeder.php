<?php

use App\Mediatype;
use Illuminate\Database\Seeder;

class Mediatypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_mediatypes = [
            "video","photo","image"
        ];

        foreach ($arr_mediatypes as $type)
        {
            $new_type = new Mediatype();
            $new_type->name = $type;
            $new_type->generateReference();
            $new_type->generateAlias();
            $new_type->save();
        }
    }
}
