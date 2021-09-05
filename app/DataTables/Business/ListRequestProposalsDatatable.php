<?php

namespace App\DataTables\Business;

use App\Models\RequestProposal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ListRequestProposalsDatatable extends DataTable
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
            ->editColumn('user_id', function ($query){
                return $query->getUser->name;
            })
            ->editColumn('farmer_email', function ($query){
                return $query->getUser->email;
            })
            ->editColumn('farmer_phone', function ($query){
                return $query->getUser->phone;
            })
            ->editColumn('status', function ($query) {
                if ($query->status === 'approved'){
                    return '<span class="badge shadow badge-success">Approved</span>';
                }
                if ($query->status === 'declined'){
                    return '<span class="badge shadow-warning badge-danger">Declined</span>';
                }
                return '<span class="badge shadow-info badge-info">Pending</span>';

            })
            ->editColumn('created_at',function ($query){
                return Carbon::parse($query->created_at)->format('l M d, Y');
            })
            ->addColumn('action', function ($query){
                $output = '<div class="btn" style="display: inline-flex;">
                        <a href="'.$query->getBusinessDashboardUrl().'" title="Proposal Details" class="btn table-btn btn-icon btn-primary btn-sm shadow-primary p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        ';
                if ($query->status === 'pending'){
                    $output .= '<a href="'.route('business.dashboard.proposal.approve', $query->id).'" title="Approve Proposal" class="btn text-white table-btn btn-icon btn-success btn-sm shadow-success p-0 mr-2"><i class="fa mt-2 fa-stamp"></i></a>';
                }
                if ($query->status === 'pending'){
                    $output .= '<a href="'. route('business.dashboard.proposal.decline', $query->id) .'" title="Decline Proposal" class="btn table-btn shadow-danger btn-danger p-0"><i class="fa mt-2 fa-times-circle"></i></a>
                       ';
                }
                $output .= ' </div>';

                return $output;
            })->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param RequestProposal $model
     * @return Builder
     */
    public function query(RequestProposal $model)
    {
        return $model->newQuery()->where('business_id', auth('business')->user()->id)->where('request_id', $this->id);
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
            Column::make('user_id')->title('Farmer'),
            Column::computed('farmer_email'),
            Column::computed('farmer_phone'),
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
        return 'ListRequestProposals_' . date('YmdHis');
    }
}
