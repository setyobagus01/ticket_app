@extends('layouts.app')
@section('container')
    @if ($errors->any())
        <ul class="list-group mb-5">
            @foreach ($errors->all() as $message)
                <li class="list-group-item list-group-item-danger">
                    {{ $message }}
                </li>
            @endforeach
        </ul>
    @endif
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
                <label class="col-sm-12 col-md-2 col-form-label">Buyer Name</label>
                <div class="col-sm-12 col-md-10">
                    <input id="buyerName" class="form-control" type="text" placeholder="Johnny Brown" name="buyer_name">
                </div>
            </div>
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
                    <input id="qty" class="form-control" value="1" type="number" name="jumlah_pemesanan">
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
                    <input id="total" class="form-control" type="number" disabled />
                    <input id="totalPay" class="form-control" type="hidden" name="total" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Sisa Bayar</label>
                <div class="col-sm-12 col-md-10">
                    <input id="sisaBayar" class="form-control" type="number" disabled />
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
    <script src="{{ asset('js/tiket.js') }}"></script>
@endsection
