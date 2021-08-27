<?php

namespace App\Http\Livewire\Invoice;

use App\Models\invoice;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $invoices = invoice::all();
        return view('livewire.invoice.table',compact('invoices'));
    }
}
