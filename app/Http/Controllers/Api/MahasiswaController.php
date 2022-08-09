<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa Berhasil Tampil',
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
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|unique:mahasiswas|',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'email' => $request->email,
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
        $mahasiswa = Mahasiswa::where('id', $id)->first();
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
        $mahasiswa = Mahasiswa::find($id)->update(
            [
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'email' => $request->email,
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
        $mahasiswa = Mahasiswa::find($id)->delete();

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
