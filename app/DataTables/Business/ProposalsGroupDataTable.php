<?php

namespace App\DataTables\Business;

use App\Models\MarketRequests;
use App\Models\RequestProposal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProposalsGroupDataTable extends DataTable
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
            ->eloquent($query)
            ->editColumn('proposals', function ($query){
                return $this->getProposal($query->id);
            })
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
            ->addColumn('action', function ($query){
                return '<a href="'.route('business.dashboard.proposals.group.detail', $query->id).'" title="Proposal Details" class="btn table-btn btn-icon btn-primary btn-sm shadow-primary p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        ';
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
        $user = auth('business')->user()->id;

        return $model->newQuery()->whereHas('getProposals', function ($query) use ($user){
            $query->where('business_id', $user);
        });
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
            Column::make('due_date')->width(100),
            Column::make('is_approved')->title('Status'),
            Column::computed('proposals'),
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
        return 'ProposalsGroup_' . date('YmdHis');
    }

    private function getProposal($id){
        return RequestProposal::query()
            ->where('business_id', auth('business')->user()->id)
            ->where('request_id', $id)->count();
    }
}
