<div class="modal" wire:ignore.self id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">{{$status}} Produk</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk" wire:model="nama">
                    </div>
                    <div class="form-group">
                        <label for="Deskripsi">Deskripsi Produk</label>
                        <textarea type="text" class="form-control" id="Deskripsi" name="Deskripsi" placeholder="Deskripsi Produk" wire:model="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Satuan">Satuan</label>
                        <input type="text" class="form-control" id="Satuan" name="Satuan" placeholder="Satuan Produk, Contoh : buah, kg, dan lain lain" wire:model="satuan">
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok</label>
                        <input type="number" class="form-control" id="Stok" name="Stok" wire:model="stok">
                    </div>
                </div>
                <div class="block-content block-content-full text-right bg-light" @if(($nama == null OR $deskripsi == null OR $satuan == null)) style="display: none" @endif>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" wire:click="submitAdd">{{$status}} Produk</button>
                </div>
            </div>
        </div>
    </div>
</div>
