<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\KontrakMatakuliah;

class KontrakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        return view('dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $semester = Semester::all('id', 'semester');
        $mahasiswa = Mahasiswa::all('id', 'nama_mahasiswa');
        $kontrak = KontrakMatakuliah::orderBy('id', 'asc')->paginate(5);
        return view('kontrak_matakuliah.kontrak_matakuliah', compact('kontrak', 'semester', 'mahasiswa'));
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
        $request->validate([
            'mahasiswa_id' => 'required|unique:kontrak_matakuliahs|',
            'semester_id' => 'required',
        ]);

        $data = new KontrakMatakuliah();

        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->semester_id = $request->semester_id;

        $data->save();

        return redirect('kontrak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'mahasiswa_id' => 'nullable',
            'semester_id' => 'nullable',
        ]);

        KontrakMatakuliah::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        return redirect('kontrak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KontrakMatakuliah::find($id)->delete();
        return redirect('kontrak');
    }
}
