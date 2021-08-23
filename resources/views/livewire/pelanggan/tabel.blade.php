<div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Konsumen</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('resetform')">Tambah Konsumen</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Cari Konsumen</label>
                    <input type="text" class="form-control" wire:model="caripelanggan"
                           placeholder="Cari berdasarkan ID/Nama/Alamat">
                </div>
            </div>
        </div>
        <div class="table-responsive" wire:ignore.self>
            <table class="table table-bordered table-striped table-vcenter ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pelanggans as $pelanggan)
                    <tr>
                        <td class="text-center">{{$pelanggan->id}}</td>
                        <td class="text-center">{{$pelanggan->nama}}</td>
                        <td class="text-center">{{$pelanggan->alamat}}</td>
                        <td class="text-center">{{$pelanggan->no_telp}}</td>
                        <td class="center">
                            <div class="btn-group text-center">
                                {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                                {{--                                title="Edit">--}}
                                {{--                            <i class="fa fa-pencil-alt"></i>--}}
                                {{--                        </button>--}}
                                <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('edit',{{$pelanggan->id}})">
                                    <i class="fa fa-edit"></i></button>
                                </button>
                                <button type="button" wire:loading.attr="disabled" wire:click="delete({{$pelanggan->id}})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                        title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$pelanggans->links()}}
        </div>
    </div>
    <!-- END Page Content -->
    @livewire('pelanggan.form')
</div>
