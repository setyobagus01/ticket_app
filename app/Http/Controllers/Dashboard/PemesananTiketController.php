<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\PemesananTiket;
use App\Http\Controllers\Controller;
use App\Exports\PemesananTiketExport;
use App\DataTables\PemesananTiketDataTable;

class PemesananTiketController extends Controller
{
    public function dashboard()
    {
        $data = PemesananTiket::with('paket')->get();
        return view('dashboard', [
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
    public function store(Request $request)
    {
        $input = $request->all();
        $input['paket_id'] = explode(", ", $input['paket_id'])[0];
        $input['invoice_number'] = $this->getInvoice(auth()->user()->id);
        $input['is_pay'] = 0;
        $input['expired_date'] = Carbon::now()->addDays(7);
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

    public function qrcode(Request $request)
    {
        $input = $request->all();

        $tiket = PemesananTiket::with(['paket'])->where('invoice_number', $input['invoice_number'])->get()->first();
        if ($tiket->total <= 0) {
            $tiket->is_pay = 1;
            return back()->with('info', 'Pengunjung sudah melunasi pembayaran');
        } else {
            return back()->with('warning', 'Pengunjung belum melunasi pembayaran');
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
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $tiket = PemesananTiket::find($id);
        $input['paket_id'] = explode(", ", $input['paket_id'])[0];
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
