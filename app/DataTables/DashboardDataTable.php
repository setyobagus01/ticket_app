<?php

namespace App\DataTables;

use App\Models\PemesananTiket;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DashboardDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PemesananTiket $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PemesananTiket $model)
    {

        return $model->with(['paket'])->orderBy('created_at', 'DESC')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dashboard-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('invoice_number'),
            Column::make('paket.name'),
            Column::make('jumlah_pemesanan'),
            Column::make('down_payment'),
            Column::make('additional_cost'),
            Column::make('total'),
            Column::make('is_pay'),
            Column::make('expired_date'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PemesananTiket_' . date('YmdHis');
    }
}
