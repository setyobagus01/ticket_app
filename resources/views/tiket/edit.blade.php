@extends('layouts.app')
@section('container')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Form Tiket</h4>
                <p>Membuat tiket berdasarkan paket yang dipilih oleh pengunjung</p>
            </div>

        </div>
        {!! Form::model($tiket, ['route' => ['tiket.update', $tiket->id], 'method' => 'patch']) !!}

        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Paket</label>
            <div class="col-sm-12 col-md-10">
                <select id="paket" class="custom-select col-12" name="paket_id">
                    @foreach ($paket as $item)
                        @if ($tiket->paket_id == $item->id)
                            <option value="{{ $item->id }}, {{ $item->price }}" selected>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}, {{ $item->price }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group row">
            {{-- <label class="col-sm-12 col-md-2 col-form-label">Jumlah Tiket</label> --}}
            {!! Form::label('jumlah_pemesanan', 'Jumlah Tiket', ['class' => 'col-sm-12 col-md-2 col-form-label']) !!}
            <div class="col-sm-6 col-md-2">
                {{-- <input id="qty" type="text" value="1" name="jumlah_pemesanan" /> --}}
                {!! Form::number('jumlah_pemesanan', null, ['id' => 'qty', 'class' => 'form-control']) !!}
            </div>

        </div>

        <div class="form-group row">
            {{-- <label class="col-sm-12 col-md-2 col-form-label">Pembayaran Lainnya</label> --}}
            {!! Form::label('additional_cost', 'Pembayaran Lainnya', ['class' => 'col-sm-12 col-md-2 col-form-label']) !!}
            <div class="col-sm-12 col-md-10">
                {{-- <input id="additional_cost" class="form-control" value="0" type="number" name="additional_cost"> --}}
                {!! Form::number('additional_cost', null, ['id' => 'additional_cost', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {{-- <label class="col-sm-12 col-md-2 col-form-label">Uang Muka</label> --}}
            {!! Form::label('down_payment', 'Uang Muka', ['class' => 'col-sm-12 col-md-2 col-form-label']) !!}
            <div class="col-sm-12 col-md-10">
                {{-- <input id="down_payment" class="form-control" value="0" type="number" name="down_payment"> --}}
                {!! Form::number('down_payment', null, ['id' => 'down_payment', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {{-- <label class="col-sm-12 col-md-2 col-form-label">Total Bayar</label> --}}
            {!! Form::label('total', 'Total Bayar', [
                'class' => 'col-sm-12 col-md-2 col-form-label',
            ]) !!}
            <div class="col-sm-12 col-md-10">
                {{-- <input id="totalPay" class="form-control" type="number" name="total" /> --}}
                <input id="total" class="form-control" type="number" disabled />
                {!! Form::hidden('total', null, ['id' => 'totalPay', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sisa Bayar</label>
            <div class="col-sm-12 col-md-10">
                <input id="sisaBayar" class="form-control" type="number" disabled />
            </div>
        </div>

        <div class="col-md-12 col-sm-12 text-right">
            {{--
    <button class="btn btn-primary" href="#" type="submit">
      Buat
    </button> --}}

            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}


        </div>
        {!! Form::close() !!}
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
