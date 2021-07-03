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
</div>
