<?php

namespace App\Http\Controllers;

use App\Http\Resources\Work\WorkResource;
use App\Models\WorkModel;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = WorkModel::with('page:id,name')
            ->with('collection:id,name')
            ->with('category:id,name')
            ->with('genre:id,name')
            ->with('writer:id,name')
            ->get();
        return WorkResource::collection($works);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WorkModel::create([
            'title' => $request->title,
            'image' => $request->image,
            'writter' => $request->writter,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'is_verified' => $request->is_verified,
            'm_genre_id' => $request->m_genre_id,
            'm_category_id' => $request->m_category_id,
            'page_id' => $request->page_id,
            'playlist_id' => $request->playlist_id,
        ]);
        return response(['msg' => 'work dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $works = WorkModel::findOrFail($id);
        return response()->json(['data' => $works]);
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
        $works = WorkModel::findOrFail($id);
        if (!$works) {
            return response(['msg' => 'Work tidak ditemukan'],);
        }
        $data = $request->all();
        $works->update($data);


        return response(['msg' => 'Work telah diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works = WorkModel::findOrFail($id);
        $works->delete();
        return response(['msg' => 'Work telah dihapus'], 200);
    }

    public function new()
    {
        $works = WorkModel::with('page:id,name')
            ->with('collection:id,name')
            ->with('category:id,name')
            ->with('genre:id,name')
            ->with('writer:id,name')
            ->orderBy('created_at', 'DESC')
            ->limit(8)
            ->get();
        return WorkResource::collection($works);
    }
}
