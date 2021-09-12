<?php

namespace App\DataTables\Farmer;

use App\Models\RequestProposal;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProposalsDatatable extends DataTable
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
            ->editColumn('business_id', function ($query){
                return $query->getBusiness->name;
            })
            ->editColumn('company_email', function ($query){
                return $query->getBusiness->email;
            })
            ->editColumn('company_phone', function ($query){
                return $query->getBusiness->phone;
            })
            ->editColumn('company_address', function ($query){
                return $query->getBusiness->address;
            })
            ->addColumn('action', 'farmer/proposalsdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param RequestProposal $model
     * @return Builder
     */
    public function query(RequestProposal $model)
    {
        return $model->newQuery()->where('user_id', auth()->user()->id);
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
            Column::make('business_id')->title('Company Name'),
            Column::computed('company_email'),
            Column::computed('company_phone'),
            Column::computed('company_address'),
            Column::make('status'),
            Column::make('created_at'),
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
        return 'Farmer/Proposals_' . date('YmdHis');
    }
}
