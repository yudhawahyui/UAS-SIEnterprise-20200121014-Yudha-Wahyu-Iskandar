@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row p-2 align-items-center justify-content-between d-flex">
            <h1 class="text-bold">Data Semester</h1>
            <x-adminlte-button label="Tambah Data Semester" data-toggle="modal" data-target="#modalCustom"
                class="bg-primary btn-sm" icon="fas fa-plus" />
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-hover table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th scope="row">#</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-dividerr">
                @foreach ($semester as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td scope="col">{{ $data->semester }}</td>
                        <td scope="col" class="d-flex">

                            {{-- Edit --}}
                            <x-adminlte-button theme="warning" data-toggle="modal"
                                data-target="#modalCustomEdit{{ $data->id }}" class="bg-warning btn-sm"
                                icon="fas fa-edit" aria-labelledby="modalCustomEdit" aria-hidden="true" />

                            {{-- Delete --}}
                            <form action="/semester/{{ $data->id }}" method="post">
                                @csrf
                                @method('delete')
                                <x-adminlte-button type="submit" class="btn btn-sm btn-danger ml-2" icon="fas fa-trash"
                                    theme="danger" />
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <x-adminlte-modal id="modalCustomEdit{{ $data->id }}" title="Edit Data Semester" size="md"
                        theme="warning" v-centered static-backdrop scrollable>
                        <div class="form-group">
                            <form action="/semester/{{ $data->id }}" method="post">
                                @csrf
                                @method('put')
                                <label for="semester">Semester :</label>
                                <x-adminlte-input name="semester" required type="number"
                                    value="{{ $data->semester }}" />

                                {{-- Button --}}
                                <x-adminlte-button class="btn-flat btn-sm" type="submit" label="Submit" theme="success"
                                    icon="fas fa-lg fa-save" />
                                <x-adminlte-button class="btn-sm" type="reset" label="Reset" theme="outline-danger"
                                    icon="fas fa-lg fa-trash" />
                            </form>
                        </div>
                        <x-slot name="footerSlot">
                        </x-slot>
                    </x-adminlte-modal>

            </tbody>
            @endforeach
        </table>

        {{-- Modal Tambah --}}
        <x-adminlte-modal id="modalCustom" title="Tambah Data Semester" size="md" theme="primary" v-centered
            static-backdrop scrollable aria-labelledby="modalUpdateBarang" aria-hidden="true">
            <div class="form-group">
                <form action="/semester" method="post">
                    @csrf
                    @method('post')
                    <label for="semester">Semester :</label>
                    <x-adminlte-input name="semester" required type="text" placeholder="Masukkan Semester" /> 

                    {{-- Button --}}
                    <x-adminlte-button class="btn-flat btn-sm" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />
                    <x-adminlte-button class="btn-sm" type="reset" label="Reset" theme="outline-danger"
                        icon="fas fa-lg fa-trash" />
                </form>
            </div>
            <x-slot name="footerSlot">
            </x-slot>
        </x-adminlte-modal>
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
