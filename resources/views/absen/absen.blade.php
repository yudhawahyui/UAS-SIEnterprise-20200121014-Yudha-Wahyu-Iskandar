@extends('adminlte::page')

@section('title', 'Kontrak Mata Kuliah')

@section('content_header')
    <div class="container">
        <div class="row p-2 align-items-center justify-content-between d-flex">
            <h1 class="text-bold">Absen Mahasiswa</h1>
        </div>
    </div>
@stop

@section('content')

    <div class="container">
        <form action="/absen" method="post">
            @csrf
            @method('post')
            <label for="mahasiswa_id">Nama Mahasiswa :</label>
            <div class="row d-flex justify-content-between justify-items-center">
                <div class="col">
                    <x-adminlte-select2 name="mahasiswa_id">
                        <option disabled selected>Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $datamahasiswa)
                            <option value="{{ $datamahasiswa->id }}">{{ $datamahasiswa->nama_mahasiswa }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                <div class="col">
                    <x-adminlte-select2 name="matakuliah_id">
                        <option disabled selected>Pilih matakuliah</option>
                        @foreach ($matkul as $datamatakuliah)
                            <option value="{{ $datamatakuliah->id }}">{{ $datamatakuliah->nama_matkul }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                <div class="col" hidden>
                    <input hidden type="datetime-local" class="form-control" name="waktu_absen" value="{{ now() }}">
                </div>
                <div class="col">
                    <x-adminlte-select2 name="keterangan">
                        <option disabled selected>Keterangan</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                    </x-adminlte-select2>
                </div>
                {{-- Button --}}
                <div class="col">
                    <x-adminlte-button class="btn-flat btn-sm" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </div>
        </form>

        <table class="table table-striped table-hover table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th scope="row">#</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Waktu Absen</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody class="table-group-dividerr">
                @foreach ($absen as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td scope="col">{{ $data->mahasiswa->nama_mahasiswa }}</td>
                        <td scope="col">{{ $data->waktu_absen }}</td>
                        <td scope="col">{{ $data->matakuliah->nama_matkul }}</td>
                        <td scope="col">{{ $data->keterangan }}</td>

                    </tr>
            </tbody>
            @endforeach
        </table>
        <div>{{ $absen->links() }}</div>
    </div>

@stop

@section('footer')
    <footer class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="text-md lead">
                Made With <i class="fas fa-heart text-danger mx-1"></i> By <i class="text-primary"><b><a
                            href="https://www.instagram.com/thisismeyudha/?hl=id" target="_blank">Yudha Wahyu
                            Iskandar</a></b></i> | 20200121014
            </div>
            <div class="text-md lead">
                <a href="https://github.com/yudhawahyui" target="_blank"><i class="fab fa-github"></i></a>
            </div>
            <div class="text-md lead">
                Pemrograman Internet Intermediate - <a href="https://cic.ac.id/" target="_blank">UCIC</a> |
                {{ date('M - y - D') }}
            </div>
        </div>
    </footer>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
