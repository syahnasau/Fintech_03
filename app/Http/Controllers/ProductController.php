<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productData = Product::all();
        return response()->json([
            "Message" => "Berhasil Mendapatkan Karyawan",
            "data" => $productData
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create(Request $request)
    {
        $productData = $request->all();
        Product::create([
            'name' => $request-> name,	
            'price'	=> $request-> price,
            'stock'	=> $request-> stock,
            'photo'	=> $request-> photo,
            'description'	=> $request-> description,
            'category_id' => $request-> category_id,
            'stand' => $request-> stand
        ]);
        if(!$productData) return response()->json([
            "Message" => "Gagal membuat Karyawan"
        ], 400);
        return response()->json([
            "Message" => "Berhasil membuat Karyawan",
            "Data" => $productData
        ], 200);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
    
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        if(!$data) return response()->json([
            "Message" => "Gagal melihat Product"
        ], 400);
        return response()->json([
            "Message" => "Berhasil melihat Product",
            "Data" => $data
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($request->id);
        $updateData = $data->update([
            'name' => $request-> name,	
            'price'	=> $request-> price,
            'stock'	=> $request-> stock,
            'photo'	=> $request-> photo,
            'description'	=> $request-> description,
            'category_id' => $request-> category_id,
            'stand' => $request-> stand
        ]);

        if(!$updateData) return response()->json([
            "Message" => "Gagal Mengupdate Karyawan",
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Karyawan",
            "data" => $updateData
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
    
     */
    public function destroy(string $id)
    {
        $dataToDelete = Product::find($id);
        $delete = $dataToDelete->delete();
        if(!$delete) return response()->json([
            "Message" => "Gagal Hapus Karyawan"
        ], 400);

        return response()->json([
            "Message" => "Berhasil Hapus Karyawan",
        ], 200);
    }
}
