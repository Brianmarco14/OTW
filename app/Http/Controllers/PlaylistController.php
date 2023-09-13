<?php

namespace App\Http\Controllers;

use App\Http\Resources\Playlist\PlaylistResource;
use App\Models\PlaylistModel;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = PlaylistModel::with('page:id,name')->get();
        return PlaylistResource::collection($playlists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PlaylistModel::create([
            'name' => $request->name,
            'image' => $request->file('image')->store('playlist', 'public'),
            'page_id' => $request->page_id
        ]);
        return response(['msg' => 'Playlist dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlists = PlaylistModel::findOrFail($id);
        return response()->json(["data" => $playlists]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $playlists = PlaylistModel::findOrFail($id);
        $data = $request->all();
        if (!$playlists) {
            return response(['msg' => 'user tidak ditemukan'],);
        }
        try {
            $data['image'] = $request->image;
            $playlists->update($data);
        } catch (\Throwable $th) {
            $data['image'] = $playlists->image;
            $playlists->update($data);
        }

        return response(['msg' => 'Playlist telah diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlists = PlaylistModel::findOrFail($id);
        $playlists->delete();
        return response(["msg" => "Playlist berhasil dihapus"]);
    }

    public function new()
    {
        $playlists = PlaylistModel::with('page:id,name')->inRandomOrder()
            ->limit(8)
            ->get();
        return PlaylistResource::collection($playlists);
    }
}
