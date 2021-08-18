@extends('layouts.app')

@section('content')
<div>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Detail Pemesanan</h1>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter ">
                                    <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($produk as $produk)
                                        <tr>
                                            <td class="text-center">B{{str_pad($produk->id,3,'0',STR_PAD_LEFT)}}</td>
                                            <td class="text-center">{{$produk->nama}}</td>
                                            <td class="text-center">{{$produk->deskripsi}}</td>
                                            <td class="text-center">{{$produk->jenis}}</td>
                                            <td class="text-center">{{$produk->pivot->jumlah}}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">Jadwal Pengiriman</div>
            <div class="block-content">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label>Tanggal Pengiriman</label>
                            <input type="text" readonly class="form-control" value="{{$pemesanan->tanggal_pengiriman}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                Detail Pemesanan
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label>Keterangan Pesanan</label>
                            <textarea class="form-control" readonly>{{$pemesanan->keterangan}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Page Content -->

</div>
@endsection
