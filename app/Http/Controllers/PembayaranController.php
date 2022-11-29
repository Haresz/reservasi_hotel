<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return $pembayaran;
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
        $pembayaran = pembayaran::create([
            "nama_pemesan" => $request->nama_pemesan,
            "tipe_kamar" => $request->tipe_kamar,
            "harga" => $request->harga,
            "tanggal_pembayaran" => $request->tanggal_pembayaran,
            "metode_pembayaran" => $request->metode_pembayaran,
            "check_in" => $request->check_in
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Pembayaran berhasil',
            'data' => $pembayaran
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
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            return response()->json([
                'status' => 200,
                'message' => 'detail pembayaran',
                'data' => $pembayaran
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'
            ], 400);
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
        $pembayaran = Pembayaran::find($id);
        if($pembayaran){
            $pembayaran->nama_pemesan = $request->nama_pemesan ? $request->nama_pemesan : $reservasi->nama_pemesan;
            $pembayaran->tipe_kamar = $request->tipe_kamar ? $request->tipe_kamar : $reservasi->tipe_kamar;
            $pembayaran->harga = $request->harga ? $request->harga : $reservasi->harga;
            $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran ? $request->tanggal_pembayaran : $reservasi->tanggal_pembayaran;
            $pembayaran->metode_pembayaran = $request->metode_pembayaran ? $request->metode_pembayaran : $reservasi->metode_pembayaran;
            $pembayaran->check_in = $request->check_in ? $request->check_in : $reservasi->check_in;
            $pembayaran->save();
            return response()->json([
                'status' => 200,
                'message' => 'jika sudah melakukan pembayaran, maka tidak dapat melakukan perubahan'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
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
        $pembayaran = Pembayaran::where('id', $id)->first();
        if($pembayaran){
            $pembayaran->delete();
            return response()->json([
                'status' => 200,
                'data' => 'pembayaran berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}
