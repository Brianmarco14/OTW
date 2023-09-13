<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page\PageResource;
use App\Models\PageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageModel::with('owner:id,name')->get();
        return PageResource::collection($pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PageModel::create([
            'name' => $request->name,
            'image' => $request->file('image')->store('page', 'public'),
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        return response(['msg' => 'Page dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = PageModel::findOrFail($id);
        return response()->json(['data' => $pages]);
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
        $pages = PageModel::findOrFail($id);
        $data = $request->all();
        try {
            $pages->update($data);
        } catch (\Throwable $th) {
            $pages->update($data);
        }
        if (!$pages) {
            return response(['msg' => 'Page tidak ditemukan'],);
        }

        return response(['msg' => 'Page telah diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = PageModel::findOrFail($id);
        $pages->delete();
        return response(['msg' => 'Page telah dihapus'], 200);
    }

    public function new()
    {
        $pages = PageModel::with('owner:id,name')
            ->inRandomOrder()
            ->limit(8)
            ->get();
        return PageResource::collection($pages);
    }
}
