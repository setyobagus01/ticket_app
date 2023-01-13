<div class="modal fade bs-example-modal-lg" id="tiketModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">

                </h5>
                <button id="printLabel" class="btn btn-info"><i class="fa fa-print"></i> Print</button>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div id="ticket" class="modal-body label">
                <div class="card">
                    <section class="date">
                        <div id="qrcode" class="qrcode">
                        </div>

                    </section>
                    <section class="card-cont">
                        <small id="invoice_number"></small>
                        <h3 id="paket"></h3>
                        <div class="even-date">
                            <i class="fa fa-calendar"></i>
                            <time>
                                <span id="expired_date"></span>
                                <span id="expired_time"></span>
                            </time>
                        </div>
                        <div class="even-info">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Jl. Sawahbera, Dayeuhluhur, Kec. Warudoyong, Kota Sukabumi, Jawa Barat 43291
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
<div class="modal" id="modalHapusData">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Tiket</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p class="my-2">Apakah Anda yakin ingin menghapus data "<strong class="text-dark"></strong>"?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <form action="{{ route('tiket.delete', 'id') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cetak Tiket -->
<div class="modal" id="modalCetakDataTiket">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cetak Excel</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('tiket.export') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group row align-items-center">
                        <label for="start_date" class="col-sm-4 col-form-label">Dari Tanggal</label>
                        <div>:</div>
                        <div class="col-sm-5">
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="end_date" class="col-sm-4 col-form-label">Sampai Tanggal</label>
                        <div>:</div>
                        <div class="col-sm-5">
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Cetak Data</button>
                </div>
            </form>

        </div>
    </div>
</div>
