<table class="table text-center table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Invoice Number</th>
      <th>Nama Paket</th>
      <th>Jumlah Pemesanan</th>
      <th>Down Payment</th>
      <th>Additional Cost</th>
      <th>Is Pay</th>
      <th>Expired Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tikets as $tiket)
    <tr>
      <td>{{ $tiket->id }}</td>
      <td>{{ $tiket->invoice_number }}</td>
      <td>{{ $tiket->paket->name }}</td>
      <td>{{ $tiket->jumlah_pemesanan }}</td>
      <td>{{ $tiket->down_payment }}</td>
      <td>{{ $tiket->additional_cost }}</td>
      <td>{{ $tiket->is_pay }}</td>
      <td>{{ Carbon\Carbon::parse($tiket->expired_date)->isoFormat('DD MMMM YYYY') }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
