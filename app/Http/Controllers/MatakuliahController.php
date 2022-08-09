<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
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
        $dataMatkul = Matakuliah::orderBy('id', 'asc')->paginate(7);
        return view('matakuliah.data-matakuliah', compact('dataMatkul'));
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
            'nama_matkul' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required|numeric',
        ]);

        $data = new Matakuliah();

        $data->nama_matkul = $request->nama_matkul;
        $data->sks = $request->sks;

        $data->save();

        return redirect('matakuliah');
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
            'nama_matkul' => 'nullable|unique:matakuliahs',
            'sks' => 'nullable|numeric',
        ]);

        Matakuliah::find($id)->update([
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);

        return redirect('matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliah::find($id)->delete();
        return redirect('matakuliah');
    }
}
