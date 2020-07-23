<?php

namespace App\DataTables;

use App\Models\State;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StateDataTable extends DataTable
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
            ->addColumn('edit', 'admin.states.btn.edit')
            ->addColumn('delete', 'admin.states.btn.delete')
            ->addColumn('checkbox', 'admin.states.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\state $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return State::getCountryAndCity();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('statedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    ->parameters([
                    'dom'  => 'Blfrtip',
                    'lengthMenu' => [[10,25,50,100],[10,25,50,trans('admin.all_records')] ],

                    'buttons' => [
                        [
                            'text' => '<i class="fa fa-plus"></i>  ' . trans('admin.create_state'),
                            'className'=>'btn btn-info my-2',
                            'action' => "function(){
                                window.location.href = '".URL::current()."/create';
                            }"
                        ],

                        ['extend'=>'print','className'=>'btn btn-primary my-2','text'=>'<i class="fa fa-print"></i>  '.trans('admin.ex_print')],
                        ['extend'=>'csv',
                        'className'=>'btn btn-info my-2',
                        'text'=>'<i class="fa fa-file"></i>  '. trans('admin.ex_csv')],
                        ['extend'=>'excel',
                        'className'=>'btn btn-success my-2',
                        'text'=>'<i class="fas fa-table"></i> '. trans('admin.ex_excel')],
                        ['extend'=>'reload',
                        'className'=>'btn btn-secondary my-2',
                        'text'=>'<i class="fas fa-sync-alt"></i>'],
                        ['text' => '<i class="fa fa-trash"></i>  ' . trans('admin.delete_all'),
                            'className'=>'btn btn-danger my-2 del_btn',
                        ],
                    ],
                        'initComplete' => "function () {
                            this.api().columns([2,3,4]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",

                        'language' => datatable_lang(),

        ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

          return[
            Column::make('checkbox','checkbox')->
            title('<input type="checkbox" name="checkbox" class="check_all" value="click" onclick="check_all()"/>'),
            Column::make('id','id')->title(trans('admin.state_id')),
            Column::make('state_name_ar','state_name_ar')->title(trans('admin.state_name_ar')),
            Column::make('state_name_en','state_name_en')->title(trans('admin.state_name_en')),
            Column::make('state_id.state_name_'.session('lang'),'state_id.state_name_'.session('lang'))->title(trans('admin.state')),
            Column::make('country_id.country_name_'.session('lang'),'country_id.country_name_'.session('lang'))->title(trans('admin.country')),
            Column::make('city_id.city_name_'.session('lang'),'city_id.city_name_'.session('lang'))->title(trans('admin.city')),


            Column::computed('edit')
                ->title(trans('admin.edit'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(20)
                ->addClass('text-center'),
            Column::computed('delete')
                ->title(trans('admin.delete'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(20)
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
        return 'States_' . date('YmdHis');
    }
}
