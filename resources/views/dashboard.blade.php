@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <h1 class="text-center text-bold pt-5">Dashboard</h1>
    <p class="text-center">Selamat Datang <b>{{ Auth::user()->name }}</b></p>
    <div class="row text-center my-5">
        <div class="col text-bold">
            <p>
                Kata kata hari ini :
                <i>
                    <?php
                    $quote = \Illuminate\Foundation\Inspiring::quote();
                    echo $quote;
                    ?>
                </i>
            </p>
        </div>
    </div>

    <div class="container">
        {{-- <h3 class="text-bold">Quick Menu</h3> --}}

        <div class="row d-flex justify-content-center">
            <div class="col">
                <x-adminlte-card title="Data Mahasiswa" theme="primary" icon="fas fa-users">
                    <div class="text-center">
                        <a href="/mahasiswa" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </x-adminlte-card>
            </div>
            <div class="col">
                <x-adminlte-card title="Data Matakuliah" theme="primary" icon="fas fa-database">
                    <div class="text-center">
                        <a href="/matakuliah" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </x-adminlte-card>
            </div>
            <div class="col">
                <x-adminlte-card title="Data Absen" theme="primary" icon="fas fa-list">
                    <div class="text-center">
                        <a href="/absen" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </x-adminlte-card>
            </div>
            <div class="col">
                <x-adminlte-card title="Jadwal Mata kuliah" theme="primary" icon="fas fa-calendar-alt">
                    <div class="text-center">
                        <a href="/jadwal" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </x-adminlte-card>
            </div>
            <div class="col">
                <x-adminlte-card title="Kontrak Matkul" theme="primary" icon="fas fa-users">
                    <div class="text-center">
                        <a href="/kontrak" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </x-adminlte-card>
            </div>
        </div>
    </div>

    
@stop

@section('footer')
<footer class="container">
    <div class="row d-flex justify-content-between align-items-center">
        <div class="text-md lead">
            Made With <i class="fas fa-heart text-danger mx-1"></i> By <i class="text-primary"><b><a href="https://www.instagram.com/thisismeyudha/?hl=id" target="_blank">Yudha Wahyu Iskandar</a></b></i> | 20200121014
        </div>
        <div class="text-md lead">
            <a href="https://github.com/yudhawahyui" target="_blank"><i class="fab fa-github"></i></a>
        </div>
        <div class="text-md lead">
            Pemrograman Internet Intermediate - <a href="https://cic.ac.id/" target="_blank">UCIC</a> | {{ date('M - y - D') }}
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
