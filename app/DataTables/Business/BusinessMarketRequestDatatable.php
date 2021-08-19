<?php

namespace App\DataTables\Business;

use App\Models\MarketRequests;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BusinessMarketRequestDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                return '<div class="btn" style="display: inline-flex;">
                        <a href="" title="Request Details" class="btn table-btn btn-icon btn-success btn-sm shadow p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        <a href="" title="Edit Request" class="btn table-btn btn-icon btn-primary btn-sm shadow p-0 mr-2"><i class="fa mt-2 fa-edit"></i></a>
                        <a href="" title="Approve Request" class="btn table-btn btn-icon btn-info btn-sm shadow p-0 mr-2" target="_blank"><i class="fa mt-2 fa-stamp"></i></a>
                        <a href="" title="Delete Request" class="btn table-btn shadow btn-warning p-0"><i class="fa mt-2 fa-trash"></i></a>
                        </div>';
            })->blacklist(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param MarketRequests $model
     * @return Builder
     */
    public function query(MarketRequests $model)
    {
        return $model->newQuery();
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
//                    ->buttons(
//                        Button::make('create'),
//                        Button::make('export'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    );
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
            Column::make('amount'),
            Column::make('due_date'),
            Column::make('is_approved')->title('Status'),
            Column::make('created_at')->title('Date Created'),
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
        return 'Market_Requests' . date('YmdHis');
    }
}
