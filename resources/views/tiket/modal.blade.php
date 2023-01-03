<div class="modal fade bs-example-modal-lg" id="tiketModal" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
            <small>dj khaled</small>
            <h3>live in sydney</h3>
            <div class="even-date">
              <i class="fa fa-calendar"></i>
              <time>
                <span>wednesday 28 december 2014</span>
                <span>08:55pm to 12:00 am</span>
              </time>
            </div>
            <div class="even-info">
              <i class="fa fa-map-marker"></i>
              <p>
                nexen square for people australia, sydney
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
