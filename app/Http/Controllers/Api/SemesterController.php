<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Data semester Berhasil Tampil',
            'data' => $semester
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
            'semester' => 'required|unique:semesters|numeric',
        ]);

        $semester = Semester::create([
            'semester' => $request->semester,
        ]);

        if ($semester) {
            return response()->json([
                'success' => true,
                'message' => 'Data semester Berhasil Ditambahkan',
                'data' => $semester
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data semester Gagal Ditambahkan',
                'data' => $semester
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
        $semester = Semester::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data semester',
            'data' => $semester
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
        $semester = Semester::find($id)->update(
            [
                'semester' => $request->semester,
            ],
        );

        return response()->json(
            [
                'success' => True,
                'message' => 'Data semester Berhasil Dirubah!',
                'data' => $semester
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
        $semester = Semester::find($id)->delete();

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dihapus!',
                'data' => $semester
            ],
            400
        );
    }
}
