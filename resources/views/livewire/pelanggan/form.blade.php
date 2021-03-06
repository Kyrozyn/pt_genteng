<div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Tambah Konsumen</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block-content">
            <div class="form-group">
                <label for="nama">Nama Konsumen</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Konsumen" wire:model="nama">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telepon</label>
                <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp Konsumen" wire:model="no_telp">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Konsumen</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Konsumen" wire:model="alamat">
            </div>
            <div class="form-group">
                <a href="#" id="cariposisi" class="btn btn-primary btn-block">Cari Posisi</a>
            </div>
            <div wire:ignore id="maps" class="center" style="width: 580px; height: 368px;"></div>
            <div class="form-group">
                <label for="lat">Lat</label>
                <input type="text" class="form-control" id="lat" name="lat" placeholder="Lat" wire:model="lat">
            </div>
            <div class="form-group">
                <label for="long">Long</label>
                <input type="text" class="form-control" id="long" name="long" placeholder="Long" wire:model="long">
            </div>
        </div>
        <div class="block-content block-content-full text-right bg-light" @if(($nama == null OR $alamat == null OR $no_telp == null OR $lat == null OR $long == null)) style="display: none" @endif>
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" wire:click="submitAdd">{{$status}} Konsumen</button>
        </div>
    </div>
    <!-- END Page Content -->
</div>

@section('scripts')
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyABAiRMExl_KVCugrFbUO5FJwNTo_94vt0&libraries=places"></script>
    <script>
        var gmarkers = [];
        function init() {

            // membuat peta
            var map = new google.maps.Map(document.getElementById('maps'), {
                'center': {lat: -6.91757808164908, lng: 107.60850421142572},
                'zoom': 7,
                scaleControl: true,
                'mapTypeId': google.maps.MapTypeId.ROADMAP
            });
            map.addListener('click', function (event){

                //jquery
                $("#lat").val(event.latLng.lat());//mengambil nilai latitude dan ditampilkan nantinya di form input
                $("#long").val(event.latLng.lng());//mengambil nilai longitude dan ditampilkan nantinya di form input
                console.log(event.latLng.lng())
                //inisialisasi marker
                var marker1 = new google.maps.Marker({
                    position: new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()),
                    title: 'lokasi',
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.BOUNCE
                });
                removeMarkers();
                gmarkers.push(marker1);
            });
            /*var marker1 = new google.maps.Marker({
                position: new google.maps.LatLng("-6.940753511329508", "107.5770901794433"),
                title: 'lokasi',
                map: map,
                draggable: false,
            });*/
            var myEl = document.getElementById('cariposisi');

            myEl.addEventListener('click',function(){
                // mengambil isi dari textarea dengan id alamat
                var alamat = document.getElementById('alamat').value;
                console.log(alamat);
                // membuat geocoder
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode(
                    {'address': alamat},
                    function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var info_window = new google.maps.InfoWindow();

                            // mendapatkan lokasi koordinat
                            var geo = results[0].geometry.location;

                            // set koordinat
                            var pos = new google.maps.LatLng(geo.lat(), geo.lng());

                            //cek lat long di dalam polygon
                            var point = new google.maps.LatLng(geo.lat(), geo.lng());

                            var lat = document.getElementById('lat').value = geo.lat();
                            @this.set('lat', lat)
                            var lng = document.getElementById('long').value = geo.lng();
                            @this.set('long', lng)
                            // menambahkan marker pada peta
                            var marker1 = new google.maps.Marker({
                                position: new google.maps.LatLng(lat, lng),
                                title: 'lokasi',
                                map: map,
                                draggable: false,
                                animation: google.maps.Animation.BOUNCE
                            });
                            map.setZoom(15)
                            map.panTo(marker1.position)
                            removeMarkers();
                            gmarkers.push(marker1);
                            // menambahkan event click ketika marker di klik
                            google.maps.event.addListener(market1, 'click', function () {
                                info_window.setContent('<b>' + alamat + '</b>');
                                info_window.open(map, this);
                            });
                        } else {
                            alert('Lokasi Tidak Ditemukan');
                        }
                    });
            },false)
        }
        function removeMarkers() {
            for (i = 0; i < gmarkers.length; i++) {
                gmarkers[i].setMap(null);
            }
        }


        google.maps.event.addDomListener(window, 'load', init);
        google.maps.event.addListener(map, "idle", function()
        {
            google.maps.event.trigger(map, 'resize');
        });
    </script>
@endsection
