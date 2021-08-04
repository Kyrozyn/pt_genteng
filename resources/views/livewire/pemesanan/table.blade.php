<div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Pemesanan</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php /** @var App\Models\pemesanan[] $pemesanans */ @endphp

                @foreach($pemesanans as $pemesanan)
                    <tr>
                        <td class="text-center">{{$pemesanan->id}}</td>
                        <td class="text-center">{{$pemesanan->pelanggan->nama}}</td>
                        <td class="text-center">{{$pemesanan->keterangan}}</td>
                        <td class="text-center">{{$pemesanan->status}}</td>
                        <td class="center">
                            <div class="btn-group text-center">
                                {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                                {{--                                title="Edit">--}}
                                {{--                            <i class="fa fa-pencil-alt"></i>--}}
                                {{--                        </button>--}}
                                <button type="button" class="btn btn-sm btn-primary mr-1">
                                    <i class="fa fa-info"></i></button>
                                </button>
                                <button type="button" wire:loading.attr="disabled" wire:click="delete({{$pemesanan->id}})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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
    @livewire('pelanggan.form')
</div>
