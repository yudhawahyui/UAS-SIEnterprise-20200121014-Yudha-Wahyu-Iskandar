<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Jadwal::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data Jadwal Berhasil Tampil',
            'data' => $mahasiswa
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
            'jadwal' => 'required|max:255',
            'matakuliah_id' => 'required|unique:jadwals|',
        ]);

        $mahasiswa = Jadwal::create([
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        if ($mahasiswa) {
            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa Berhasil Ditambahkan',
                'data' => $mahasiswa
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa Gagal Ditambahkan',
                'data' => $mahasiswa
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
        $mahasiswa = Jadwal::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Mahasiswa',
            'data' => $mahasiswa
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
        $mahasiswa = Jadwal::find($id)->update(
            [
                'jadwal' => $request->jadwal,
                'matakuliah_id' => $request->matakuliah_id,
            ],
        );

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Mahasiswa Berhasil Dirubah!',
                'data' => $mahasiswa
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
        $mahasiswa = Jadwal::find($id)->delete();

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dihapus!',
                'data' => $mahasiswa
            ],
            400
        );
    }
}
