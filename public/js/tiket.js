$("#printLabel").click(function () {
    screenshot();
});

function screenshot() {
    html2canvas(document.getElementById("ticket")).then(function (canvas) {
        download(canvas, 'tiket.png')
    });
}

/* Canvas Donwload */
function download(canvas, filename) {
  /// create an "off-screen" anchor tag
  var lnk = document.createElement('a'), e;

  /// the key here is to set the download attribute of the a tag
  lnk.download = filename;

  /// convert canvas content to data-uri for link. When download
  /// attribute is set the content pointed to by link will be
  /// pushed as "download" in HTML5 capable browsers
  lnk.href = canvas.toDataURL("image/png;base64");

  /// create a "fake" click-event to trigger the download
  if (document.createEvent) {
    e = document.createEvent("MouseEvents");
    e.initMouseEvent("click", true, true, window,
                     0, 0, 0, 0, 0, false, false, false,
                     false, 0, null);

    lnk.dispatchEvent(e);
  } else if (lnk.fireEvent) {
    lnk.fireEvent("onclick");
  }
}

function getTiket(id) {
    $.ajax({
        type: "GET",
        url: `/tiket/label/${id}`,
        success: function (data) {
            console.log(data);
            let modal = $("#tiketModal");
            modal.modal("show");
            modal.find("#qrcode").html(data.qrcode);
        },
    });
}

const deleteTiket = (id) => {
    $("#modalHapusData")
            .find("p strong")
            .html(id);
    $("#modalHapusData").find("form").attr('action', `/tiket/delete/${id}`);
    $("#modalHapusData").find("input[name='id']").val(id);
    $('#modalHapusData').modal('show');
}

/* Create & Edit Tiket [START] */
function totalPay() {
    let paket = $("#paket").val().split(", ").map(Number)[1];
    let qty = parseInt($("#qty").val());
    let down_payment = parseInt($("#down_payment").val());
    let additional_cost = parseInt($("#additional_cost").val());

    let totalPay = paket * qty + additional_cost - down_payment;
    $("#totalPay").val(totalPay);
    console.log(additional_cost);
    console.log(down_payment);
    console.log(qty);
    console.log(paket);
}
totalPay();
$("#paket").change(function () {
    totalPay();
});
$("#qty").change(function () {
    totalPay();
});
$("#down_payment").change(function () {
    totalPay();
});
$("#additional_cost").change(function () {
    totalPay();
});
/* Create & Edit Tiket [END] */
