<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Blog extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;
    #[Layout('components.layouts.account_page')]
    public array $breadcumb = [];

    public $filters = [
        'search'=>'',
        'status'=> [],
        'materi'=> [],
        'kategori'=> [],
        'kelas'=> [],
        'created_at'=> '',
    ];

    public bool $showFilters = false;
    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function resetFilters() { $this->reset('filters'); }

    public function updatedFilters(){ $this->resetPage(); }
    public function mount(){

        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Blog' =>  [
                'active' => false,
                'route_name' => ''
            ]
        ];
    }

    // pengambilan data
    public function getRowsQueryProperty(){

        $query = Post::query()->with('kelas')->with('kategori')->with('materi')->with('user')
        ->when($this->filters['search'], fn($query, $value) => $query->where('title', 'like', '%' . $value . '%'))
        ->when($this->filters['created_at'], function($query, $date) {
            $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            return $query->whereDate('created_at', $formattedDate);
        })
        ->when($this->filters['status'], fn($query, $value) => $query->where('status', 'like', '%' . $value . '%'))
        ->when(!empty($this->filters['kelas']), function($query){
            $query->whereHas('kelas', function ($querys) {
                return $querys->whereIn('id', $this->filters['kelas']);
            });
        })
        ->when(!empty($this->filters['materi']), function($query){
            $query->whereHas('materi', function ($querys) {
                return $querys->whereIn('id', $this->filters['materi']);
            });
        })
        ->when(!empty($this->filters['kategori']), function($query){

            $query->whereHas('kategori', function ($querys) {
                return $querys->whereIn('id', $this->filters['kategori']);
            });
        });
        return $this->applySorting($query);
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }
    public function render()
    {
        return view('livewire.dashboard.blog', [
            'breadcumb' => $this->breadcumb,
            'posts' => $this->rows
        ]);
    }
}
