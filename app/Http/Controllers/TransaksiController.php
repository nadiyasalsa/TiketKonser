<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
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
        $table = Transaksi::create([
            "kode_tiket" => $request->kode_tiket,
            "tanggal_order" => $request->tanggal_order,
            "batas_transaksi" => $request->batas_transaksi,
            "subtotal" => $request->subtotal,
            "metode_transaksi" => $request->metode_transaksi,
            "bukti_transaksi" => $request->bukti_transaksi,
        ]);

    return response()->json([
        'success' => 201,
        'message' => 'data transaksi berhasil disimpan',
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
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $transaksi

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
        $transaksi = Transaksi::find($id);
        if ($transaksi){
                $transaksi->kode_tiket = $request->kode_tiket ? $request->kode_tiket : $transaksi->kode_tiket;
                $transaksi->tanggal_order = $request->tanggal_order ? $request->tanggal_order : $transaksi->tanggal_order;
                $transaksi->batas_transaksi = $request->batas_transaksi ? $request->batas_transaksi : $transaksi->batas_transaksi;
                $transaksi->subtotal = $request->subtotal ? $request->subtotal : $transaksi->subtotal;
                $transaksi->metode_transaksi = $request->metode_transaksi ? $request->metode_transaksi : $transaksi->metode_transaksi;
                $transaksi->bukti_transaksi = $request->bukti_transaksi ? $request->bukti_transaksi : $transaksi->bukti_transaksi;
                $transaksi->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'data transaksi berhasil diupdate',
                    'data' => $transaksi
    
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
        $transaksi = Transaksi::where('id',$id)->first();
        if ($transaksi) {
            $transaksi->delete();
            return response()->json([
                'status' => 200,
                'message' => 'data transaksi berhasil dihapus',
                'data' => $transaksi

            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => ' id '  .  $id  . ' tidak ditemukan '
            ], 404);
        }
    }
}
