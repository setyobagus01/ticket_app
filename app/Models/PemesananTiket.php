<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PemesananTiket extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_tiket';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket', 'paket_id', 'id');
    }


    public function getQrCodeAttribute()
    {
        return ''. QrCode::size(150)->generate($this->invoice_number).'';
    }
}
