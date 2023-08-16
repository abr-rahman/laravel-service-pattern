<?php

namespace App\DataTables;

use App\Models\Task;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TaskDataTable extends DataTable
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
            ->eloquent($query)->addIndexColumn()
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {

                    $html = '<div class="form-check form-switch">';
                    $html .= '<input class="form-check-input change_status" data-url="' . route('task.change.status', [$row->id]) . '" style="width: 34px; border-radius: 10px; height: 14px !important;  background-color: #2ea074; margin-left: -7px;" type="checkbox" checked />';
                    $html .= '</div>';
                    return $html;
                } else {

                    $html = '<div class="form-check form-switch">';
                    $html .= '<input class="form-check-input change_status" data-url="' . route('task.change.status', [$row->id]) . '" style="width: 34px; border-radius: 10px; height: 14px !important; margin-left: -7px;" type="checkbox" />';
                    $html .= '</div>';
                    return $html;
                }
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item edit-btn"  href="' . route('tasks.edit', $row->id) . '">Edit</a>';
                $html .= '<a class="dropdown-item delete-btn" href="' . route('tasks.destroy', $row->id) . '">Delete</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TaskDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model)
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('taskdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex', 'SL NO'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('task'),
            Column::make('priority'),
            Column::computed('status'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Task_' . date('YmdHis');
    }
}
