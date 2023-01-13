@extends('layouts.app')
@section('css')
    <style>
        .btn-datatables {
            padding: 0.5em !important;
        }

        th {
            text-align: center !important;
        }

        .px-20 {
            padding-left: 20px;
            padding-right: 20px;
        }

        @import url('https://fonts.googleapis.com/css?family=Oswald');
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/ticket.css') }}" />
    <script type="text/javascript" src="{{ asset('css/html2canvas-master/dist/html2canvas.js') }}"></script>
@endsection
@section('container')
    @include('flash-message')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div id="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>DataTable</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tiket
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="text-right col-md-6 col-sm-12">

                        <a href='{{ route('tiket.create') }}' class="btn btn-primary" role="button">
                            <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                            Buat Tiket
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Checkbox select Datatable End -->
        <!-- Export Datatable start -->
        <div class="card-box">
            <div class="pd-20">
                <h4 class="text-blue h4">Table Pemesanan Tiket</h4>
            </div>
            @role('owner|admin')
                <div class="flex-row px-20 d-flex">
                    <button class="mx-1 btn btn-sm btn-success" data-toggle="modal" data-target="#modalCetakDataTiket"><i
                            class="icon-copy fa fa-print" aria-hidden="true"></i> Cetak Data Excel</button>
                </div>
            @endrole
            <div class="pb-20">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        {!! $dataTable->table(['class' => 'table table-bordered w-100 text-center'], true) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>

    @include('tiket.modal')
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ asset('js/tiket.js') }}"></script>
@endpush
