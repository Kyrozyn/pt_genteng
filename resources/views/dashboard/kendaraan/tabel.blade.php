@extends('layouts.dashboard')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Kendaraan</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('resetform')">Tambah Kendaraan</button>
            </div>
        </div>
        @livewire('kendaraan.tabel')
    </div>
    <!-- END Page Content -->
    @livewire('kendaraan.form')
@endsection

