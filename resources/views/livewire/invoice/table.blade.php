<div>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h3 font-w400 mt-0 mb-0 mb-sm-1">Daftar Invoice</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th>ID Invoice</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php /** @var App\Models\invoice[] $invoices */ @endphp

                @foreach($invoices as $invoice)
                    <tr>
                        <td class="text-center">{{$invoice->id}}</td>
                        <td class="center">
                            <div class="btn-group text-center">
                                {{--                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"--}}
                                {{--                                title="Edit">--}}
                                {{--                            <i class="fa fa-pencil-alt"></i>--}}
                                {{--                        </button>--}}
                                <a href="{{url('/pengiriman/invoice/'.$invoice->id)}}" type="button" class="btn btn-sm btn-primary mr-1">
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
    <!-- END Page Content -->
    {{--    @livewire('pelanggan.form')--}}
</div>
