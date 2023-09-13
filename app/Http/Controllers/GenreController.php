<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = GenreModel::all();
        return response()->json(['data'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GenreModel::create([
            'name' => $request->name,
            'bg' => $request->file('bg')->store('background', 'public'),
        ]);
        return response(['msg'=>'Genre dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genres = GenreModel::findOrFail($id);
        return response()->json(['data'=>$genres]);
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
        $genres = GenreModel::findOrFail($id);
        $data = $request->all();
        $image_path = $request->file('bg')->store('background', 'public');
        try {
            $data['bg'] = $image_path;
            $genres->update($data);
        } catch (\Throwable $th) {
            $genres->update($data);

        }
        if (!$genres) {
            return response(['msg'=>'Genre tidak ditemukan'], );
        }

        return response(['msg'=>'Genre telah diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genres = GenreModel::findOrFail($id);
        $genres->delete();
        return response(['msg'=>'Genre telah dihapus'], 200);
    }
}
