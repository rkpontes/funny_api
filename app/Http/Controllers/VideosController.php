<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideosController extends Controller
{


    public function index(){
        $videos = Video::all();

        if($videos->isNotEmpty())
            return response()->json($videos);
        else
            return response()->json(['message'   => 'Record not found'], 404);
    }

    public function create(){
        // Exception
    }

    public function store(Request $request){

        return response()->json($request);

        $v = new Video();
        $v->title = $request->title;
        $v->description = $request->description;
        $v->youtube_key = $this->getYoutubeIdFromUrl($request->youtubeUri);
        $v->playlist_id = $request->playlist_id;
        $saved = $v->save();

        if($saved)
            return response()->json(['message'   => "Record created", 'json' => $v]);
        else
            return response()->json(['message'   => 'Record not created'], 404);
    }

    public function show($video){

        $v = Video::find($video);

        if($v)
            return response()->json($v);
        else
            return response()->json(['message'   => 'Record not found'], 404);
    }

    public function edit($video){
        // Exception
    }

    public function update($video, Request $request){
        $v = Video::find($video);
        $v->title = $request->title;
        $v->description = $request->description;
        $v->youtube_key = $this->getYoutubeIdFromUrl($request->youtubeUri);
        $v->playlist_id = $request->playlist_id;
        $saved = $v->save();

        if($saved)
            return response()->json(['message'   => "Record updated", 'json' => $v]);
        else
            return response()->json(['message'   => 'Record not updated'], 404);
    }

    public function destroy($video){
        $v = Video::find($video);

        if($v){
            $deleted = $v->delete();

            if($deleted)
                return response()->json(['message'   => "Record #{$video} deleted"]);
            else
                return response()->json(['message'   => 'Record not deleted'], 404);
        }else{
            return response()->json(['message'   => 'Record not found'], 404);
        }

    }

    private function getYoutubeIdFromUrl($url) {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $result);
        return $result;
    }


}
