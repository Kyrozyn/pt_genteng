@extends('layouts.dashboard')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Pelanggan</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-form">Tambah Pelanggan</button>
            </div>
        </div>
        @livewire('pelanggan.tabel')
    </div>
    <!-- END Page Content -->
    @livewire('pelanggan.form')
@endsection

