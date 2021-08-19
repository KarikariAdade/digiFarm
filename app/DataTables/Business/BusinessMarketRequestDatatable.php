<?php

namespace App\DataTables\Business;

use App\Models\MarketRequests;
use Carbon\Carbon;
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
            ->editColumn('is_approved', function ($query) {
                if ($query->is_approved != false){
                    return '<span class="badge shadow badge-success">Approved</span>';
                }
                return '<span class="badge shadow-warning badge-warning">Pending</span>';
            })
            ->editColumn('request_type', function ($query) {
                return ucwords(str_replace('_', ' ', $query->request_type));
            })
            ->editColumn('due_date', function ($query){
                return Carbon::parse($query->due_date)->format('l M d, Y');
            })
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('l M d, Y');
            })
            ->addColumn('action', function ($query) {
                $output = '<div class="btn" style="display: inline-flex;">
                        <a href="'.route('business.dashboard.request.show', $query->id).'" title="Request Details" class="btn table-btn btn-icon btn-primary btn-sm shadow-primary p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        <a href="'.route('business.dashboard.request.edit', $query->id).'" title="Edit Request" class="btn table-btn btn-icon btn-warning btn-sm shadow-warning p-0 mr-2"><i class="fa mt-2 fa-edit"></i></a>
                        ';
                if ($query->is_approved != true){
                    $output .= '<a href="'.route('business.dashboard.request.approve', $query->id).'" title="Approve Request" class="btn text-white table-btn btn-icon btn-success btn-sm shadow-success p-0 mr-2" target="_blank"><i class="fa mt-2 fa-stamp"></i></a>';
                }
                        $output .= '<a href="'. route('business.dashboard.request.delete', $query->id) .'" title="Delete Request" class="btn table-btn shadow-danger btn-danger p-0"><i class="fa mt-2 fa-trash"></i></a>
                        </div>';

                return $output;
            })->rawColumns(['action', 'is_approved']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param MarketRequests $model
     * @return Builder
     */
    public function query(MarketRequests $model)
    {
        $business = auth()->guard('business')->user()->id;

        $now = date('Y-m-d');

        $query = $model->newQuery()->where('business_id', $business);

        $start_date = $this->request()->get('from');
        $end_date = $this->request()->get('to');
        $status = $this->request()->get('status');

        if (!empty($start_date) && !empty($end_date) && !empty($status)) {
            if ($status === 'approved'){
                return $query->where('is_approved', true)->whereBetween('created_at', [$start_date, $end_date]);
            }

            return $query->where('is_approved', false)->whereBetween('created_at', [$start_date, $end_date]);
        }

        if(empty($status) && !empty($start_date) && !empty($end_date)) {
            return $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        if(!empty($status) && empty($start_date) && empty($end_date)) {
            if ($status === 'approved'){
                return $query->where('is_approved', true);
            }

            return $query->where('is_approved', false);
        }

        return $query;

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
            Column::make('amount'),
            Column::make('due_date')->width(100),
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
