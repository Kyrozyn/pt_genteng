<div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Produk</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('resetform')">Tambah Produk</button>
            </div>
        </div>
        @livewire('produk.tabel')
    </div>
    <!-- END Page Content -->
    @livewire('produk.form')
    <div class="table-responsive" wire:ignore.self>
        <table class="table table-bordered table-striped table-vcenter ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produks as $produk)
                <tr>
                    <td class="text-center">{{$produk->id}}</td>
                    <td class="text-center">{{$produk->nama}}</td>
                    <td class="text-center">{{$produk->deskripsi}}</td>
                    <td class="text-center">{{$produk->satuan}}</td>
                    <td class="text-center">{{$produk->stok}}</td>
                    <td class="center">
                        <div class="btn-group text-center">
                            {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                            {{--                                title="Edit">--}}
                            {{--                            <i class="fa fa-pencil-alt"></i>--}}
                            {{--                        </button>--}}
                            <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#modal-form" onclick="Livewire.emit('edit',{{$produk->id}})">
                                <i class="fa fa-edit"></i></button>
                            </button>
                            <button type="button" wire:loading.attr="disabled" wire:click="delete({{$produk->id}})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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
