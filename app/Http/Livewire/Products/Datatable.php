<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Datatable extends LivewireDatatable
{
    public $model = Product::class;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id')
                ->filterable(),


            Column::name('name')
                ->label(__('Product name'))
                ->sortBy('name'),


            Column::name('description')
                ->label(__('Product description'))
                ->sortBy('description'),


            DateColumn::name('created_at')
                ->label(__('Created at'))
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.datatable-actions', ['id' => $id]);
            })
                ->label(__('Actions'))
                ->unsortable()
        ];
    }
}
