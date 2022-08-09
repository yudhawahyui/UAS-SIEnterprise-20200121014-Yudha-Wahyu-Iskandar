<?php

namespace App\Http\Controllers\Api;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data Matakuliah Berhasil Tampil',
            'data' => $matakuliah
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
            'nama_matkul' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required|numeric',
        ]);

        $matakuliah = Matakuliah::create([
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);

        if ($matakuliah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Matakuliah Berhasil Ditambahkan',
                'data' => $matakuliah
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data Matakuliah Gagal Ditambahkan',
                'data' => $matakuliah
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
        $matakuliah = Matakuliah::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Matakuliah',
            'data' => $matakuliah
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
        $matakuliah = Matakuliah::find($id)->update(
            [
                'nama_matkul' => $request->nama_matkul,
                'sks' => $request->sks,
            ],
        );

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Matakuliah Berhasil Dirubah!',
                'data' => $matakuliah
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
        $matakuliah = Matakuliah::find($id)->delete();

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dihapus!',
                'data' => $matakuliah
            ],
            400
        );
    }
}
