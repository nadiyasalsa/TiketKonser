<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderTiket;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = OrderTiket::all();
        return $order;
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
        $table = OrderTiket::create([
            "nama_konser" => $request->nama_konser,
            "jenis_tiket" => $request->jenis_tiket,
            "email" => $request->email,
            "nama" => $request->nama,
            "no_hp" => $request->no_hp,
            "harga_tiket" => $request->harga_tiket,
            "jumlah_tiket" => $request->jumlah_tiket,
            "total" => $request->total,
        ]);

    return response()->json([
        'success' => 201,
        'message' => 'data order berhasil disimpan',
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
        $order = OrderTiket::find($id);
        if ($order) {
            return response()->json([
                'status' => 200,
                'data' => $order

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
        $order = OrderTiket::find($id);
        if ($order){

                $order->nama_konser = $request->nama_konser ? $request->nama_konser : $order->nama_konser;
                $order->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $order->jenis_tiket;
                $order->email = $request->email ? $request->email : $order->email;
                $order->nama = $request->nama ? $request->nama : $order->nama;
                $order->no_hp = $request->no_hp ? $request->no_hp : $order->no_hp;
                $order->harga_tiket = $request->harga_tiket ? $request->harga_tiket : $order->harga_tiket;
                $order->jumlah_tiket = $request->jumlah_tiket ? $request->jumlah_tiket : $order->jumlah_tiket;
                $order->total = $request->total ? $request->total : $order->total;
                $order->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'data order berhasil diupdate',
                    'data' => $order
    
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
        $order = OrderTiket::where('id',$id)->first();
        if ($order) {
            $order->delete();
            return response()->json([
                'status' => 200,
                'message' => 'data order berhasil dihapus',
                'data' => $order

            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => ' id '  .  $id  . ' tidak ditemukan '
            ], 404);
        }
    }
}
