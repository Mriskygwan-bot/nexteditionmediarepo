<?php

namespace App\Http\Controllers;

use App\Media;
use App\Mediatype;
use Illuminate\Http\Request;
use App\Http\Resources\Media as MediaResource;
use App\Http\Resources\Mediatype as MediatypeResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->_uploadImageDir = "uploads".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR;
    }

    public function index(Request $request){

        return MediaResource::collection(Media::all());
    }

    public function createMedia(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'mediatype' => 'required|exists:mediatypes,ref',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $mediatype = Mediatype::where('ref',$request->get('mediatype'))->first();

        if(empty($mediatype)){
            return [
                "error" => "mediatype not found."
            ];
        }

        $new_media = new Media();
        $new_media -> name = $request->get('name');
        $new_media -> description = $request->get('description');
        $new_media -> mediatype()->associate($mediatype);
        $new_media -> generateReference();
        $new_media -> generateAlias();
        $new_media -> active = true;

        if($request->hasFile("image"))
        {
            if(!Storage::exists($this->_uploadImageDir))
            {
                Storage::makeDirectory($this->_uploadImageDir);
            }

            $val = $request->file("image")->storeAs($this->_uploadImageDir.$new_media
                    ->ref,$new_media->ref.".".$request->file("image")
                    ->extension());

            $new_media->src = $val;
        }

        $new_media ->save();

        return new MediaResource($new_media);
    }

    public function mediatypes(Request $request)
    {
        return MediatypeResource::collection(Mediatype::all());
    }
}
