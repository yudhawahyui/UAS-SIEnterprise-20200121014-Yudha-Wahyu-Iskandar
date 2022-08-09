<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KontrakMatakuliah;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrak = KontrakMatakuliah::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data kontrak Berhasil Tampil',
            'data' => $kontrak
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|unique:kontrak_matakuliahs|',
            'semester_id' => 'required',
        ]);

        $kontrak = KontrakMatakuliah::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        if ($kontrak) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kontrak Matakuliah Berhasil Ditambahkan',
                'data' => $kontrak
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data Kontrak Matakuliah Gagal Ditambahkan',
                'data' => $kontrak
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontrak = KontrakMatakuliah::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kontrak Matakuliah',
            'data' => $kontrak
        ], 200);
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
        $kontrak = KontrakMatakuliah::find($id)->update(
            [
                'mahasiswa_id' => $request->mahasiswa_id,
                'semester_id' => $request->semester_id,
            ],
        );

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Kontrak Matakuliah Berhasil Dirubah!',
                'data' => $kontrak
            ],
            400
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontrak = KontrakMatakuliah::find($id)->delete();

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dihapus!',
                'data' => $kontrak
            ],
            400
        );
    }
}
