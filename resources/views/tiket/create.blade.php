@extends('layouts.app')
@section('container')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Form Tiket</h4>
                <p>Membuat tiket berdasarkan paket yang dipilih oleh pengunjung</p>
            </div>

        </div>
        <form action="{{ route('tiket.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Paket</label>
                <div class="col-sm-12 col-md-10">
                    <select id="paket" class="custom-select col-12" name="paket_id">
                        @foreach ($paket as $item)
                            <option value="{{ $item->id }}, {{ $item->price }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Jumlah Tiket</label>
                <div class="col-sm-6 col-md-2">
                    <input id="qty" type="text" value="1" name="jumlah_pemesanan" />
                </div>


            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Pembayaran Lainnya</label>
                <div class="col-sm-12 col-md-10">
                    <input id="additional_cost" class="form-control" value="0" type="number" name="additional_cost">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Uang Muka</label>
                <div class="col-sm-12 col-md-10">
                    <input id="down_payment" class="form-control" value="0" type="number" name="down_payment">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Total Bayar</label>
                <div class="col-sm-12 col-md-10">
                    <input id="totalPay" class="form-control" type="number" name="total" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12 text-right">

                <button class="btn btn-primary" href="#" type="submit">
                    Buat
                </button>


            </div>
        </form>
    </div>
@endsection
@section('script')
    <!-- switchery js -->
    <script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <!-- bootstrap-touchspin js -->
    <script src="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script>
    <script>
        function totalPay() {
            let paket = $('#paket').val().split(", ").map(Number)[1];
            let qty = parseInt($('#qty').val());
            let down_payment = parseInt($('#down_payment').val());
            let additional_cost = parseInt($('#additional_cost').val());

            let totalPay = ((paket * qty) + additional_cost) - down_payment;
            $('#totalPay').val(totalPay);

        }
        totalPay();
        $('#paket').change(function() {
            totalPay();
        });
        $('#qty').change(function() {
            totalPay();
        });
        $('#down_payment').change(function() {
            totalPay();
        });
        $('#additional_cost').change(function() {
            totalPay();
        });
    </script>
@endsection
