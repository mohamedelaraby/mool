<?php

namespace App\DataTables;

use App\Models\City;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CityDataTable extends DataTable
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
            ->addColumn('edit', 'admin.cities.btn.edit')
            ->addColumn('delete', 'admin.cities.btn.delete')
            ->addColumn('checkbox', 'admin.cities.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return City::query()->with('country_id')->select('cities.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('countrydatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    ->parameters([
                    'dom'  => 'Blfrtip',
                    'lengthMenu' => [[10,25,50,100],[10,25,50,trans('admin.all_records')] ],

                    'buttons' => [
                        [
                            'text' => '<i class="fa fa-plus"></i>  ' . trans('admin.create_country'),
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
            Column::make('id','id')->title(trans('admin.city_id')),
            Column::make('city_name_ar','city_name_ar')->title(trans('admin.city_name_ar')),
            Column::make('city_name_en','city_name_en')->title(trans('admin.city_name_en')),
            Column::make('country_id.country_name_'.app()->getLocale(),'country_id.country_name_'.app()->getLocale())->title(trans('admin.country')),


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
        return 'Cities_' . date('YmdHis');
    }
}
