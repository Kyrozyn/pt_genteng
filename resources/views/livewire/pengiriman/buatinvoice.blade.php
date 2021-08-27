<div>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Buat Invoice untuk
                    Kendaraan {{$kendaraan->no_plat}}</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        @if(isset($pesan))
            <div class="row">
                <div class="col col-12">
                    <div class="alert alert-danger" role="alert">
                        {{$pesan}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if(!isset($pesan))
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    Pesanan yang belum dikirim
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter ">
                                    <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>ID Pemesanan</th>
                                        <th>Nama Konsumen</th>
                                        <th>Status</th>
                                        <th>Detail Pemesanan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pemesanans as $key=>$pemesanan)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{$pemesanan->id}}</td>
                                            <td class="text-center">{{$pemesanan->pelanggan->nama}}</td>
                                            <td class="text-center">{{$pemesanan->status}}</td>
                                            <td class="center">
                                                <div class="btn-group text-center">
                                                    {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                                                    {{--                                title="Edit">--}}
                                                    {{--                            <i class="fa fa-pencil-alt"></i>--}}
                                                    {{--                        </button>--}}
                                                    <a href="{{url('/pemesanan/lihat/'.$pemesanan->id)}}" type="button" class="btn btn-sm btn-primary mr-1">
                                                        <i class="fa fa-info"></i></a>
                                                    </button>
                                                </div>
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
                    <div class="block-header block-header-default">
                        Rekomendasi Rute Pengiriman
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter ">
                                        <thead>
                                        <tr class="text-center">
                                            <th>Rekomendasi Rute Ke-</th>
                                            <th>Rute Yang Akan Di tempuh (sesuai no)</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rute as $no => $rt)
                                            @php($ruto = '')
                                            <tr>
                                                <td class="text-center">{{$no+1}}</td>
                                                <td>Toko - @foreach($rt as $r) {{$r}} -
                                                    <?php $ruto = $ruto.$r.'-';?>
                                                    @endforeach Gudang
                                                </td>
                                                <td><button type="button"  wire:click="submitinvoice({{$kendaraan->id}},'{{$ruto}}')" class="btn btn-primary">Pilih rute Ini</button> </td>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach($rute as $no => $rt)
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <font size="5px" >Peta Rute ke-{{$no+1}}</font>
                                            <div id="maps{{$no}}" class="center" style="width: 580px; height: 368px;"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
    <!-- END Page Content -->
</div>

@section('scripts')
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyABAiRMExl_KVCugrFbUO5FJwNTo_94vt0&libraries=places"></script>
    @if(!isset($pesan))
        <script>@foreach($rute as $no => $rt)
            function initMap{{$no}}() {
                var mapOptions = {
                    zoom: 13,
                    center: new google.maps.LatLng({{$lat_toko}}, {{$long_toko}}),
                    mapTypeId: 'roadmap'
                };
                var map{{$no}} = new google.maps.Map(document.getElementById('maps{{$no}}'), mapOptions);
                var roadTripCoordinates{{$no}} = [
                    {lat:{{$lat_toko}},lng: {{$long_toko}}},
                        @foreach($rt as $r)
                    {lat:{{$pemesanans[$r-1]->pelanggan->lat}},lng: {{$pemesanans[$r-1]->pelanggan->long}}},
                        @endforeach
                    {lat:{{$lat_toko}},lng: {{$long_toko}}}
                ]
                var roadTrip{{$no}} = new google.maps.Polyline({
                    path: roadTripCoordinates{{$no}},
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                var info_window = new google.maps.InfoWindow();
                //marker toko
                var markertoko = new google.maps.Marker({
                    position: new google.maps.LatLng({{$lat_toko}}, {{$long_toko}}),
                    title: 'Posisi Gudang',
                    map: map{{$no}},
                    draggable: false,
                    animation: google.maps.Animation.BOUNCE,
                    icon:{
                        url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    }
                });
                google.maps.event.addListener(markertoko, 'click', function () {
                    info_window.setContent('<b>' + 'Posisi Gudang' + '</b>');
                    info_window.open(map{{$no}}, this);
                });
                //marker pesanan
                @foreach($rt as $noo => $r)
                var marker{{$noo}} = new google.maps.Marker({
                    position: new google.maps.LatLng({{$pemesanans[$r-1]->pelanggan->lat}}, {{$pemesanans[$r-1]->pelanggan->long}}),
                    title: 'Pemesanan No {{$r}}',
                    map: map{{$no}},
                    draggable: false,
                    animation: google.maps.Animation.BOUNCE
                });
                google.maps.event.addListener(marker{{$noo}}, 'click', function () {
                    info_window.setContent('<b>' + 'Pemesanan No {{$r}}' + '</b>');
                    info_window.open(map{{$no}}, this);
                });
                @endforeach
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < roadTripCoordinates{{$no}}.length; i++) {
                    bounds.extend(roadTripCoordinates{{$no}}[i]);
                }
                bounds.getCenter();
                roadTrip{{$no}}.setMap(map{{$no}});
            }
            google.maps.event.addDomListener(window, 'load', initMap{{$no}}());
            @endforeach</script>
    @endif
@endsection
