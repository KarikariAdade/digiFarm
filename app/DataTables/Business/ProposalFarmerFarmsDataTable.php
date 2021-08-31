<?php

namespace App\DataTables\Business;

use App\Models\Farm;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProposalFarmerFarmsDataTable extends DataTable
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
            ->editColumn('farm_category_id', function ($query){
                return $query->getCategory->name;
            })
            ->editColumn('farm_sub_category_id', function ($query){
                return $query->getSubCategory->name;
            })
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('l M d, Y');
            })
            ->addColumn('action', function ($query){
                return '
                        <div style="display: inline-flex;">
                        <a href="'.route('business.dashboard.proposal.view.farm', $query->id).'" title="Farm Details" class="btn table-btn btn-icon btn-primary btn-sm shadow-primary p-0 mr-2"><i class="fa mt-2 fa-eye"></i></a>
                        </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Farm $model
     * @return Builder
     */
    public function query(Farm $model)
    {
        return $model->newQuery()->where('user_id', $this->id);
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
            Column::make('name'),
            Column::make('farm_category_id')->title('Farm Category'),
            Column::make('farm_sub_category_id')->title('Farm Type'),
            Column::make('address'),
            Column::make('average_production'),
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
        return 'ProposalFarmerFarms_' . date('YmdHis');
    }
}
