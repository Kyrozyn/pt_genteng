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
                                                                                              max="{{$produk->stok}}">
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                <p class="mb-0">Silahkan pilih produk</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="custom-control custom-block custom-control-primary">
                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block1" name="example-cb-custom-block1">
                        <label class="custom-control-label" for="example-cb-custom-block1">
                                                    <span class="d-flex align-items-center">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                                                        <span class="ml-2">
                                                            <span class="font-w700">Amber Harvey</span>
                                                            <span class="d-block font-size-sm text-muted">Web Designer</span>
                                                        </span>
                                                    </span>
                        </label>
                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
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
    </div>
    <!-- END Page Content -->

</div>
