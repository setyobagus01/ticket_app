<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\DashboardDataTable;
use Carbon\Carbon;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\PemesananTiket;
use App\Http\Controllers\Controller;
use App\Exports\PemesananTiketExport;
use App\DataTables\PemesananTiketDataTable;
use App\Http\Requests\QrCodeRequest;
use App\Http\Requests\TicketRequest;

class PemesananTiketController extends Controller
{
    public function dashboard(DashboardDataTable $dataTable)
    {
        $data = PemesananTiket::with('paket')->get();
        return $dataTable->render('dashboard', [
            'data' => $data,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PemesananTiketDataTable $dataTable)
    {
        $tiket = PemesananTiket::all();
        return $dataTable->render('tiket.index', ["tiket" => $tiket]);
    }

    /**p
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paket = Paket::all();
        return view('tiket.create', ["paket" => $paket]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $input = $request->all();
        $input['paket_id'] = explode(", ", $input['paket_id'])[0];
        $input['invoice_number'] = $this->getInvoice(auth()->user()->id);
        if ($input['total'] <= 0) {

            $input['is_pay'] = 1;
        } else {
            $input['is_pay'] = 0;
        }
        $input['expired_date'] = Carbon::now()->addDays(7);
        if (auth()->user()->hasRole('ticket_in')) {
            $input['tiket_masuk'] = now();
        }

        PemesananTiket::create($input);
        return redirect('tiket');
    }


    public function getInvoice($user)
    {
        $invoiceNumber = $this->generateInvoice($user);
        while (PemesananTiket::where('invoice_number', $invoiceNumber)->exists()) {
            $invoiceNumber = $this->generateInvoice($user);
        }
        return $invoiceNumber;
    }

    public function generateInvoice($user)
    {
        $today = now();
        $totalToday = PemesananTiket::whereDate('created_at', $today->toDateString())->count() + 1;
        $number = str_pad($totalToday, 5, '0', STR_PAD_LEFT);
        return "INV/$today->year/$today->month/$today->day/$user/$number";
    }

    public function scan()
    {

        return view('tiket.scan');
    }

    public function qrcode(QrCodeRequest $request)
    {
        $input = $request->all();

        $tiket = PemesananTiket::with(['paket'])->where('invoice_number', $input['invoice_number'])->get()->first();
        if (isset($tiket)) {
            if (auth()->user()->hasRole('ticket_in')) {
                if ($tiket->total <= 0) {
                    $tiket->update([
                        "tiket_masuk" => is_null($tiket->tiket_masuk) ? now() : $tiket->tiket_masuk,
                        "is_pay" => 1
                    ]);

                    return back()->with('info', 'Pengunjung sudah melunasi pembayaran atas nama ' . $tiket->buyer_name);
                } else {
                    return back()->with('warning', 'Pengunjung belum melunasi pembayaran atas nama ' . $tiket->buyer_name);
                }
            } else {
                $tiket->update(["tiket_keluar" => now()]);
                return back()->with('info', 'Scan berhasil');
            }
        } else {
            return back()->with('error', 'Invoice ' . $input['invoice_number'] . ' tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiket = PemesananTiket::with(['paket'])->find($id);
        $paket = Paket::all();
        if (empty($tiket)) {
            return back()->with('error', 'Tiket tidak ditemukan');
        }
        return view('tiket.edit', ["tiket" => $tiket, "paket" => $paket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        $input = $request->all();
        $tiket = PemesananTiket::find($id);
        $input['paket_id'] = explode(", ", $input['paket_id'])[0];
        if ($input['total'] <= 0) {
            $input['is_pay'] = 1;
        }
        $tiket->update($input);

        return redirect(route('tiket.index'))->with('success', 'Tiket berhasil diupdate');
    }

    public function label($id)
    {
        $tiket = PemesananTiket::with(['paket'])->find($id);

        if (empty($tiket)) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan');
        }

        return ["tiket" => $tiket, "qrcode" => $tiket->qrcode];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $tiket = PemesananTiket::find($id);
        $tiket->delete();

        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dihapus');
    }

    public function export(Request $request)
    {
        $startDate = Carbon::createFromFormat('Y-m-d H', $request['start_date'] . '0')->startOfDay()->toDateTimeString();
        $endDate = Carbon::createFromFormat('Y-m-d H', $request['end_date'] . '23')->endOfDay()->toDateTimeString();

        return (new PemesananTiketExport($startDate, $endDate))->download('pemesanan_tiket_' . $startDate . '-' . $endDate . '.xlsx');
    }
}
