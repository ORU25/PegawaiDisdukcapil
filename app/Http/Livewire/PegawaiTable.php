<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class PegawaiTable extends DataTableComponent
{   
    protected $model = Pegawai::class;

    public function columns(): array
    {
        return [
            ButtonGroupColumn::make('Actions')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2 text-center ',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->title(fn($row) => '')
                        ->location(fn($row) => route('dtail', $row->nip))
                        ->attributes(function($row) {
                            return [
                                'class' => 'fa-solid fa-eye ',
                            ];
                        }),
                    
            ]),
            Column::make('NAMA', 'nama_lengkap')
                ->sortable()
                ->searchable(),
                
            Column::make('NIP', 'nip')
                ->sortable()
                ->searchable(),
            Column::make('JENIS', 'jenis')
                ->sortable()
                ->searchable(),
            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable(),
            Column::make('HP', 'hp')
                ->sortable()
                ->searchable(),
            Column::make('Tanggal Lahir', 'tanggal_lahir')
                ->sortable()
                ->searchable(),
           
        ];            
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function query(): Builder
    {
        return Pegawai::query();
    }
}