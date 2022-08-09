<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class MahasiswaController extends Controller
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
        $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(5);
        return view('mahasiswa.data-mahasiswa', compact('mahasiswa'));
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
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|unique:mahasiswas|',
        ]);

        $data = new Mahasiswa();

        $data->nama_mahasiswa = $request->nama_mahasiswa;
        $data->email = $request->email;
        $data->no_tlp = $request->no_tlp;
        $data->alamat = $request->alamat;

        $data->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('mahasiswa')->with('toast_success', 'Data Berhasil Ditambahkan');
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
        // $data = Mahasiswa::where('id', $id,)->first();

        // return view('dosen.data-mahasiswa', ['mahasiswa' => $data]);
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
            'nama_mahasiswa' => 'nullable|max:255',
            'no_tlp' => 'nullable|numeric',
            'alamat' => 'nullable',
            'email' => 'nullable',
        ]);

        Mahasiswa::find($id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('mahasiswa');
    }
}
