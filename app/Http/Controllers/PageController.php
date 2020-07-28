<?php

namespace App\Http\Controllers;

use App\Media;
use App\Page;
use App\Http\Resources\Page as PageResource;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function __construct()
    {

    }

    function getPages()
    {
        return PageResource::collection(Page::all());
    }

    function getPage(Request $request)
    {
        /*Validation*/

        $validator = $request->validate([
            'page'    => 'required|exists:pages,ref',
        ]);


        $page = Page::where('ref',$request->get('page'))->first();

        return new PageResource($page);
    }

    function addMedia(Request $request)
    {
        $page  = Page::where('ref',$request->get('page'))->first();
        $media = Media::where('ref',$request->get('media'))->first();

        $page->media()->attach($media);
    }
}
