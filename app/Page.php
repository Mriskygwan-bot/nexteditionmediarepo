<?php

namespace App;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function generateReference()
    {
        $key_length = 16;
        do{
            $reference = Helpers::getAlphaNum($key_length);
        }while(!empty($this->where('ref',$reference)->first()));

        $this->attributes['ref'] = $reference;
    }

    public function generateAlias()
    {
        $str_alias = strtolower($this->attributes['name']);
        $str_alias = str_replace(" ","-",$str_alias);
        $alias_count = Page::where('alias','like','%'.$str_alias.'%')->get()->count();

        if($alias_count > 0)
        {
            $str_alias .= $alias_count;
        }

        $this->attributes['alias'] = $str_alias;
    }

    public function media()
    {
        return $this->belongsToMany('App\Media');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}