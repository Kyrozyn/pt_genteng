<div class="modal" wire:ignore.self id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">{{$status}} Pelanggan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Rekening" wire:model="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pelanggan</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Nama Rekening" wire:model="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="No Rekening" wire:model="no_telp">
                    </div>
                </div>
                <div class="block-content block-content-full text-right bg-light" @if(($nama == null OR $alamat == null OR $no_telp == null) AND $status =='Tambah') style="display: none" @endif>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" wire:click="submitAdd">Tambah Pelanggan</button>
                </div>
            </div>
        </div>
    </div>
</div>
