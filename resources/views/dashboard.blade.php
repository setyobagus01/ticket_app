@extends('layouts.app')
@section('container')
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Hospital Overview</h2>
        </div>

        <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $data->sum->jumlah_pemesanan }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Total Penjualan Tiket
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf">
                                <i class="icon-copy dw dw-calendar1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $data->where('paket_id', '=', '2')->count('paket_id') }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Total Booking
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#6AD7FF">
                                <i class="icon-copy fa fa-book" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $data->where('paket_id', '=', '1')->count('paket_id') }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Total Reguler
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon">
                                <i class="icon-copy fa fa-ticket" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $data->sum('total') + $data->sum('down_payment') + $data->sum('additional_cost') }}</div>
                            <div class="font-14 text-secondary weight-500">
                                Total Pemasukan
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06">
                                <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Penjualan Terbaru</div>
            {!! $dataTable->table(['class' => 'table table-bordered w-100 text-center'], true) !!}
        </div>




    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
