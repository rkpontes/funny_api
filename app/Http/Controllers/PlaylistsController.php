<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Playlist;

class PlaylistsController extends Controller
{


    public function index(){
        $playlists = Playlist::all();

        if($playlists->isNotEmpty())
            return response()->json($playlists);
        else
            return response()->json(['message'   => 'Record not found'], 404);
    }

    public function create(){
        // Exception
    }

    public function store(Request $request){
        $p = new Playlist();
        $p->name = $request->name;
        $saved = $p->save();

        if($saved)
            return response()->json(['message'   => "Record created", 'json' => $p]);
        else
            return response()->json(['message'   => 'Record not created'], 404);

    }

    public function show($playlist){
        $playlist = Playlist::find($playlist);

        if($playlist)
            return response()->json($playlist);
        else
            return response()->json(['message'   => 'Record not found'], 404);
    }

    public function edit($playlist){
        // Exception
    }

    public function update($playlist, Request $request){
        $p = Playlist::find($playlist);
        $p->name = $request->name;
        $saved = $p->save();

        if($saved)
            return response()->json(['message'   => "Record updated", 'json' => $p]);
        else
            return response()->json(['message'   => 'Record not updated'], 404);
    }

    public function destroy($playlist){
        $p = Playlist::find($playlist);

        if($p){
            $deleted = $p->delete();

            if($deleted)
                return response()->json(['message'   => "Record #{$playlist} deleted"]);
            else
                return response()->json(['message'   => 'Record not deleted'], 404);
        }else{
            return response()->json(['message'   => 'Record not found'], 404);
        }
    }



}
