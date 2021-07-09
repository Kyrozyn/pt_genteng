<div class="modal" wire:ignore.self id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">{{$status}} Kendaraan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <label for="nama">Nama Kendaraan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kendaraan" wire:model="nama">
                    </div>
                    <div class="form-group">
                        <label for="plat">No Plat</label>
                        <input type="text" class="form-control" id="plat" name="plat" placeholder="No Plat Kendaraan" wire:model="no_plat">
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Dalam satuan Pcs" wire:model="kapasitas">
                    </div>
                </div>
                <div class="block-content block-content-full text-right bg-light" @if(($nama == null OR $no_plat == null OR $kapasitas == null)) style="display: none" @endif>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" wire:click="submitAdd">{{$status}} Kendaraan</button>
                </div>
            </div>
        </div>
    </div>
</div>
