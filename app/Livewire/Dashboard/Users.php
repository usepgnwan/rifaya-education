<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Users extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]
    public $filters = [
        'search' => '',
    ];

    protected $queryString = ['sorts'];
    protected $listeners = ['refreshTransactions' => '$refresh'];

    public array $breadcumb = [];

    public function mount(){

        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Users' =>  [
                'active' => false,
            ]
        ];
    }


    public function updatedFilters() {  $this->resetPage(); }

    public function getRowsQueryProperty()
    {
        // dd($this->perPage);
        $query = User::query()
            ->when($this->filters['search'], fn($query, $status) => $query->where('name','like' , '%'.$status.'%'));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        // return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        // });
    }

    public function render()
    {
        return view('livewire.dashboard.users',[
            'users' => $this->rows,
            'breadcumb' => $this->breadcumb
        ]);
    }
}
