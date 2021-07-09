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
                <td class="text-center">{{$kendaraan->kapasitas}}</td>
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
