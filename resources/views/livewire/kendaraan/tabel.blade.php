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
    <div class="table-responsive" wire:ignore.self>
        <table class="table table-bordered table-striped table-vcenter ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Plat</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kendaraans as $kendaraan)
                <tr>
                    <td class="text-center">{{$kendaraan->id}}</td>
                    <td class="text-center">{{$kendaraan->nama}}</td>
                    <td class="text-center">{{$kendaraan->no_plat}}</td>
                    <td class="text-center">{{$kendaraan->kapasitas}} Pcs</td>
                    <td class="center">
                        <div class="btn-group text-center">
                            {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                            {{--                                title="Edit">--}}
                            {{--                            <i class="fa fa-pencil-alt"></i>--}}
                            {{--                        </button>--}}
                            <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('edit',{{$kendaraan->id}})">
                                <i class="fa fa-edit"></i></button>
                            </button>
                            <button type="button" wire:loading.attr="disabled" wire:click="delete({{$kendaraan->id}})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                    title="Delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Page Content -->
@livewire('kendaraan.form')
