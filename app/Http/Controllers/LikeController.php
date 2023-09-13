<?php

namespace App\Http\Controllers;

use App\Http\Resources\Like\LikeResource;
use App\Models\LikeModel;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = LikeModel::all();
        return LikeResource::collection($likes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LikeModel::create([
            'user_id' => $request->user_id,
            'work_id' => $request->work_id,
            'm_category_id' => $request->m_category_id
        ]);
        return response(['msg'=>'Like dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $likes = LikeModel::findOrFail($id);
        return response()->json(['data'=>$likes]);

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
        $likes = LikeModel::findOrFail($id);
        $data = $request->all();
        if (!$likes) {
            return response(['msg'=>'Like tidak ditemukan'], );
        }

        return response(['msg'=>'Like telah diubah'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $likes = LikeModel::findOrFail($id);
        $likes->delete();
        return response(['msg'=>'Like telah dihapus'], 200);
    }
}
