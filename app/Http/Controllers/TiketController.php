<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiketKonser;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = TiketKonser::all();
        return $tiket;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = TiketKonser::create([
            "nama_konser" => $request->nama_konser,
            "guest_star" => $request->guest_star,
            "jenis_tiket" => $request->jenis_tiket,
            "description" => $request->description,
            "tanggal" => $request->tanggal,
            "tempat" => $request->tempat,
            "harga_tiket" => $request->harga_tiket,
            "stok_tiket" => $request->stok_tiket,
        ]);

    return response()->json([
        'success' => 201,
        'message' => 'data tiket berhasil disimpan',
        'data' => $table
    ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiket = TiketKonser::find($id);
        if ($tiket) {
            return response()->json([
                'status' => 200,
                'data' => $tiket

            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => ' id '  .  $id  . ' tidak ditemukan '
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $tiket = TiketKonser::find($id);
        if ($tiket){
                $tiket->nama_konser = $request->nama_konser ? $request->nama_konser : $tiket->nama_konser;
                $tiket->guest_star = $request->guest_star ? $request->guest_star : $tiket->guest_star;
                $tiket->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $tiket->jenis_tiket;
                $tiket->description = $request->description ? $request->description : $tiket->description;
                $tiket->tanggal = $request->tanggal ? $request->tanggal : $tiket->tanggal;
                $tiket->tempat = $request->tempat ? $request->tempat : $tiket->tempat;
                $tiket->harga_tiket = $request->harga_tiket ? $request->harga_tiket : $tiket->harga_tiket;
                $tiket->stok_tiket = $request->stok_tiket ? $request->stok_tiket : $tiket->stok_tiket;
                $tiket->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'data tiket berhasil diupdate',
                    'data' => $tiket
    
                ], 200);

                }else{
                return response()->json([
                    'status' => 404,
                    'message' => ' id '  .  $id  . ' tidak ditemukan '
                ], 404);
            }
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = TiketKonser::where('id',$id)->first();
        if ($tiket) {
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'message' => 'data tiket berhasil dihapus',
                'data' => $tiket

            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => ' id '  .  $id  . ' tidak ditemukan '
            ], 404);
        }
    }
}    