<?php

namespace App\Http\Controllers;

use App\Http\Resources\Subscribe\SubscribeResource;
use App\Models\SubscribeModel;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = SubscribeModel::with('user:id,name')->with('page:id,name')->get();
        return SubscribeResource::collection($subs);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubscribeModel::create([
            'user_id' => $request->user_id,
            'page_id' => $request->page_id,
        ]);
        return response(['msg'=>'Subscribe dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subs = SubscribeModel::findOrFail($id);
        return response()->json(['data'=>$subs]);

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
        $subs = SubscribeModel::findOrFail($id);
        $data = $request->all();
        if (!$subs) {
            return response(['msg'=>'Subscribe tidak ditemukan'], );
        }

        return response(['msg'=>'Subscribe telah diubah'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subs = SubscribeModel::findOrFail($id);
        $subs->delete();
        return response(['msg'=>'Subscribe telah dihapus'], 200);
    }
}
