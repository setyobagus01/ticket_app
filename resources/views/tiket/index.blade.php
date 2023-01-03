@extends('layouts.app')
@section('css')

    <style>
        .btn-datatables {
            padding: 0.5em !important;
        }

        @import url('https://fonts.googleapis.com/css?family=Oswald');




    </style>
     <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/ticket.css') }}" />
     <script type="text/javascript" src="{{ asset('css/html2canvas-master/dist/html2canvas.js') }}"></script>
@endsection
@section('container')
    @include('flash-message')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
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
                    <div class="col-md-6 col-sm-12 text-right">

                        <a href='{{ route('tiket.create') }}' class="btn btn-primary" role="button">
                            Buat Tiket
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Checkbox select Datatable End -->
        <!-- Export Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Data Table with Export Buttons</h4>
            </div>
            <div class="pb-20">
                {{-- <table class="table hover multiple-select-row data-table-export nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Name</th>
                            <th>Age</th>
                            <th>Office</th>
                            <th>Address</th>
                            <th>Start Date</th>
                            <th>Salart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-plus">Gloria F. Mead</td>
                            <td>25</td>
                            <td>Sagittarius</td>
                            <td>2829 Trainer Avenue Peoria, IL 61602</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Gemini</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>20</td>
                            <td>Gemini</td>
                            <td>2829 Trainer Avenue Peoria, IL 61602</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Sagittarius</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>25</td>
                            <td>Gemini</td>
                            <td>2829 Trainer Avenue Peoria, IL 61602</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>20</td>
                            <td>Sagittarius</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>18</td>
                            <td>Gemini</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Sagittarius</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Sagittarius</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Gemini</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Gemini</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td class="table-plus">Andrea J. Cagle</td>
                            <td>30</td>
                            <td>Gemini</td>
                            <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                            <td>29-03-2018</td>
                            <td>$162,700</td>
                        </tr>
                    </tbody>
                </table> --}}
                {!! $dataTable->table(['class' => 'table table-bordered'], true) !!}
            </div>
        </div>
        <!-- Export Datatable End -->
    </div>
    </div>

    @include('tiket.modal')
@endsection



@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $('#printLabel').click(function() {
            screenshot();
        });

        function screenshot(){
         html2canvas(document.getElementById('ticket')).then(function(canvas) {
            document.body.appendChild(canvas);
         });
      }


        function getTiket(id) {
            $.ajax({
                type: 'GET',
                url: `/tiket/label/${id}`,
                success: function(data) {
                    console.log(data);
                    let modal = $('#tiketModal');
                    modal.modal('show');
                    modal.find('#qrcode').html(data.qrcode)
                }
            })
        }
    </script>
@endpush
