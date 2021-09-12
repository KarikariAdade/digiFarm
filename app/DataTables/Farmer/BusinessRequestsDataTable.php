<?php

namespace App\DataTables\Farmer;

use App\Models\MarketRequests;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BusinessRequestsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('request_type', function ($query) {
                return ucwords(str_replace('_', ' ', $query->request_type));
            })
            ->editColumn('due_date', function ($query){
                return Carbon::parse($query->due_date)->format('l M d, Y');
            })
            ->addColumn('action', function ($query){
                return '<a href="'.route('farmer.dashboard.client.request.details', $query->id).'" title="Request Details" class="btn table-btn btn-icon btn-primary btn-sm shadow-primary p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        ';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param MarketRequests $model
     * @return Builder
     */
    public function query(MarketRequests $model)
    {
        return $model->newQuery()->where('business_id', $this->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
            Column::make('title'),
            Column::make('request_type'),
            Column::make('product_type'),
            Column::make('quantity'),
            Column::make('due_date')->width(100),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Farmer/BusinessRequests_' . date('YmdHis');
    }
}
