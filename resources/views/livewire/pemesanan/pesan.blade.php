<div>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Pemesanan Baru</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                Produk yang dipesan
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger @if($pending) d-block @else d-none @endif" role="alert">
                            <p class="mb-0">Pengiriman akan mengalami keterlambatan dikarenakan stok yang dipesan kurang</p>
                        </div>
                    </div>
                    <div class="col-12">
                        @if(!$produkselected==null)
                            <div class="table-responsive" wire:ignore.self>
                                <table class="table table-bordered table-striped table-vcenter ">
                                    <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($produkselected as $produk)
                                        <tr>
                                            <td class="text-center">{{$produk->id}}</td>
                                            <td class="text-center">{{$produk->nama}}</td>
                                            <td class="text-center">{{$produk->deskripsi}}</td>
                                            <td class="text-center">{{$produk->satuan}}</td>
                                            <td class="text-center">{{$produk->stok}}</td>
                                            <td class="text-center" style="width: 20%"><input class="form-control"
                                                                                              type="number"
                                                                                              wire:model="jumlahproduk.{{$produk->id}}"
                                                                                              min="1"
                                                                                              >
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <p class="mb-0">Silahkan pilih produk</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">Tambah Produk</div>
            <div class="block-content">
                <div class="form-group">
                    <label>Cari Produk</label>
                    <input type="text" class="form-control" wire:model="cariproduk"
                           placeholder="Cari berdasarkan ID/Nama/Deskripsi/Satuan">
                </div>
                @if($produks->isNotEmpty())
                    <div class="table-responsive" wire:ignore.self>
                        <table class="table table-bordered table-striped table-vcenter ">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
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
                                    <td class="text-center">{{$produk->jenis}}</td>
                                    <td class="text-center">{{$produk->stok}}</td>
                                    <td class="text-center">
                                        <div class="btn-group text-center">
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip"
                                                    title="Tambah Produk" wire:click="tambahProduk({{$produk->id}},1)">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $produks->links() }}
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <p class="mb-0">Data Produk Kosong!</p>
                    </div>
                @endif
            </div>

        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">Pelanggan</div>
            <div class="block-content">
                <div class="form-group">
                    <label>Cari Pelanggan</label>
                    <input type="text" class="form-control" wire:model="caripelanggan"
                           placeholder="Cari berdasarkan ID/Nama/Alamat">
                </div>
                <div class="row">
                    @if(!$caripelanggan == null)
                        @if($pelanggans->isNotEmpty())
                            @foreach($pelanggans as $pelanggan)
                                <div class="col-3 pb-2">
                                    <div class="custom-control custom-block custom-control-primary">
                                        <input type="radio" class="custom-control-input" id="{{$pelanggan->id}}"
                                               name="pelanggan" value="{{$pelanggan->id}}" wire:model="idpelanggan">
                                        <label class="custom-control-label" for="{{$pelanggan->id}}">
                                                    <span class="d-flex align-items-center">
                                                        <img class="img-avatar img-avatar48"
                                                             src="{{asset('assets/media/avatars/avatar8.jpg')}}" alt="">
                                                        <span class="ml-2">
                                                            <span class="font-w700">{{$pelanggan->nama}}</span>
                                                            <span
                                                                class="d-block font-size-sm text-muted">{{$pelanggan->id}}</span>
                                                        </span>
                                                    </span>
                                        </label>
                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    <p class="mb-0">Data Pelanggan Kosong!</p>
                                </div>
                            </div>
                        @endif
                    @endif
                    {{--                    <div class="col-8">--}}
                    {{--                        {{ $pelanggans->links() }}--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">Jadwal Pengiriman</div>
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning @if($pending) d-block @else d-none @endif" role="alert">
                            <p class="mb-0">Tanggal pengiriman mengalami penyesuaian dikarenakan stok kurang</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label>Tanggal Pengiriman</label>
                            <input type="date" wire:model="tanggal" class="form-control" min="@if($pending){{now()->add('+7 day')->format('Y-m-d')}}@else{{now()->format('Y-m-d')}}@endif" value="@if($pending){{now()->add('+7 day')->format('Y-m-d')}}@else{{now()->format('Y-m-d')}}@endif">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                Konfirmasi Pemesanan
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label>Keterangan Pesanan</label>
                            <textarea wire:model="keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4">
                        <button class="btn btn-primary" wire:click="buatPemesanan" @if(empty($produkselectedid) or $tanggal == null or $idpelanggan == null) disabled @endif>Buat Pemesanan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Page Content -->

</div>
