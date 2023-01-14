@extends('layouts.app')
@section('container')
    @include('flash-message')
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
                <h4 class="text-blue h4">Scan Tiket</h4>
                <p>Menscan qr code tiket pengunjung</p>
            </div>


        </div>
        <form action="{{ route('tiket.qrcode') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Invoice Number</label>
                <div class="col-md-8">
                    <input id="totalPay" class="form-control" type="text" name="invoice_number" />
                </div>
                <div class="text-right">

                    <button class="btn btn-primary" href="#" type="submit">
                        Scan
                    </button>


                </div>
            </div>

        </form>
    </div>
@endsection
