<div>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Detail Invoice {{$invoice->id}}</h1>
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
                        Cetak invoice
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col col-12" style="margin-bottom: 20px">
                                <a href="{{url('/laporan/invoice/'.$invoice->id)}}" class="btn btn-primary">Cetak Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded">
                <div class="block-header block-header-default">
                    Pesanan
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
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Detail Pemesanan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoice->pemesanans as $key=>$pemesanan)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{$pemesanan->id}}</td>
                                            <td class="text-center">{{$pemesanan->pelanggan->nama}}</td>
                                            <td class="text-center">{{$pemesanan->pelanggan->alamat}}</td>
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
                        Biaya
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-12">
                                <h4>Rp. {{number_format($invoice->biaya,2,',','.')}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    Rute Pengiriman
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                Toko-{{$invoice->rute}}-Toko
                            </div>
                        </div>
                        <div class="col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="maps" class="center" style="width: 580px; height: 368px;"></div>
                                    </div>
                                </div>
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
        <script>
            function initMap() {
                var mapOptions = {
                    zoom: 13,
                    center: new google.maps.LatLng({{$lat_toko}}, {{$long_toko}}),
                    mapTypeId: 'roadmap'
                };
                var map = new google.maps.Map(document.getElementById('maps'), mapOptions);
                var roadTripCoordinates = [
                    {lat:{{$lat_toko}},lng: {{$long_toko}}},
                        @foreach($invoice->pemesanans as $no => $pemesanan)
                    {lat:{{$pemesanan->pelanggan->lat}},lng: {{$pemesanan->pelanggan->long}}},
                        @endforeach
                    {lat:{{$lat_toko}},lng: {{$long_toko}}}
                ]
                var roadTrip = new google.maps.Polyline({
                    path: roadTripCoordinates,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                var info_window = new google.maps.InfoWindow();
                //marker toko
                var markertoko = new google.maps.Marker({
                    position: new google.maps.LatLng({{$lat_toko}}, {{$long_toko}}),
                    title: 'Posisi Gudang',
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.BOUNCE,
                    icon:{
                        url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    }
                });
                google.maps.event.addListener(markertoko, 'click', function () {
                    info_window.setContent('<b>' + 'Posisi Gudang' + '</b>');
                    info_window.open(map, this);
                });
                //marker pesanan
                @foreach($invoice->pemesanans as $noo => $pemesanan)
                var marker{{$noo}} = new google.maps.Marker({
                    position: new google.maps.LatLng({{$pemesanan->pelanggan->lat}}, {{$pemesanan->pelanggan->long}}),
                    title: 'Pemesanan No {{$pemesanan->id}}',
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.BOUNCE
                });
                google.maps.event.addListener(marker{{$noo}}, 'click', function () {
                    info_window.setContent('<b>' + 'Pemesanan No {{$pemesanan->id}}' + '</b>');
                    info_window.open(map, this);
                });
                @endforeach
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < roadTripCoordinates.length; i++) {
                    bounds.extend(roadTripCoordinates[i]);
                }
                bounds.getCenter();
                roadTrip.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initMap());
        </script>
    @endif
@endsection
