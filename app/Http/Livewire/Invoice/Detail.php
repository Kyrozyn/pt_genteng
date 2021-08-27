<?php

namespace App\Http\Livewire\Invoice;

use App\Models\invoice;
use Livewire\Component;

class Detail extends Component
{
    public $lat_toko = -6.784921, $long_toko = 108.284192;
    public invoice $invoice;
    public function render()
    {
        return view('livewire.invoice.detail');
    }
}
