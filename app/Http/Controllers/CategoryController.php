<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryModel::all();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CategoryModel::create([
            'name' => $request->name,
            'bg' => $request->file('bg')->store('background', 'public'),
        ]);
        return response(['msg'=>'Category dibuat'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = CategoryModel::findOrFail($id);
        return response()->json(['data'=>$categories]);
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
        $categories = CategoryModel::find($id);
        if (!$categories) {
            return response(['msg'=>'Category tidak ditemukan'], );
        }
       
        $categories->update($request->all());
        // try {
        //     $data['bg']=$request->file('bg')->store('background');
        //     $categories->update($data);
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     $data['bg']=$categories->bg;
        // }

        return response(['msg'=>'Category telah diubah'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = CategoryModel::findOrFail($id);
        $categories->delete();
        return response(['msg'=>'Category telah dihapus'], 200);
    }
}
