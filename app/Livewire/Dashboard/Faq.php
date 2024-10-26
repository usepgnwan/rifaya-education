<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\Faq as ModelsFaq;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Faq extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]


    public $filters = [
        'search' => '',
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'title' => null,
        'body' => null,

    ];
    public bool $showFilters = false;
    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public ModelsFaq $_data;

    #[On('body')]
    public function updateBody($content)
    {
        $this->request['body'] = $content;
    }
    public function rules()
    {
        $userId = $this->_data->id;

        // dd($userId);
        return [
            'request.title' => 'required|min:3',
            'request.body' => 'required|min:3',
        ];
    }

    public function validationAttributes () {
        return [
            'request.title' => 'Pertanyaan',
            'request.body' => 'Jawaban',
        ];
    }

    public function mount()
    {

        $this->_data = $this->makeBlankTransaction();
        $this->default_sorts = ['created_at' => 'desc'];
        $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Q&A' =>  [
                'active' => false,
            ]
        ];
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    function makeBlankTransaction()
    {
        return ModelsFaq::make();
    }
    public function save()
    {
       try {
            $this->validate();
            if(!$this->_data->id){
                $this->_data->create($this->request);
            }else{
                // Update the user
                $this->_data->fill($this->request);
                $this->_data->save();
                $message = 'Succes update Q&A '.$this->_data->title;
            }

            $this->notify($message ?? 'Succes create Q&A '. $this->request['title']);
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function create()
    {

        $this->dispatch('tiny:init', ['body' => '#body']);
        $this->_data = $this->makeBlankTransaction();
        $this->request = $this->_data->getAttributes();
        $this->showEditModal = true;
    }

    public function edit(ModelsFaq $mapel)
    {

        $this->dispatch('tiny:init', ['body' => '#body']);
        $this->useCachedRows();
        if ($this->_data->isNot($mapel)) $this->_data = $mapel;

        $this->request['title']  = $this->_data->title;
        $this->request['body']  = $this->_data->body;
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {

        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->selectPage = false;
        $this->notify('You\'ve deleted '.$deleteCount.' transactions');
    }
    public function resetFilters() { $this->reset('filters'); }
    public function updatedFilters()
    {
        $this->resetPage();
    }
    public function getRowsQueryProperty()
    {
        // dd($this->perPage);
        $query = ModelsFaq::query();

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
        return $this->applyPagination($this->rowsQuery);
        });
    }
    public function render()
    {
        return view('livewire.dashboard.faq',[
            'data' => $this->rows,
        ]);
    }
}
