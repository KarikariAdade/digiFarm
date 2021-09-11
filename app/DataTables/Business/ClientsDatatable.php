<?php

namespace App\DataTables\Business;

use App\Models\Clients;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClientsDatatable extends DataTable
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
            ->editColumn('client_name', function ($query){
                return $query->getUser->name;
            })
            ->editColumn('email', function ($query){
                return $query->getUser->email;
            })
            ->editColumn('phone', function ($query){
                return $query->getUser->phone;
            })
            ->editColumn('city', function ($query){
                return $query->getUser->city;
            })
            ->editColumn('address', function ($query) {
                return $query->address;
            })
            ->editColumn('created_at', function ($query){
                return Carbon::parse($query->created_at)->format('l M d, Y');
            })
            ->addColumn('action', function ($query) {
                return '<a href='.route('business.dashboard.client.detail', $query->id).' class="btn btn-primary btn-sm shadow-primary"><span class="fa fa-eye"></span></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Clients $model
     * @return Builder
     */
    public function query(Clients $model)
    {
        return $model->newQuery()->where('business_id', auth('business')->user()->id);
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
            Column::computed('client_name'),
            Column::computed('email'),
            Column::computed('phone'),
            Column::computed('city'),
            Column::computed('address'),
            Column::make('created_at')->title('Client Since'),
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
        return 'Business_Clients_' . date('YmdHis');
    }
}
