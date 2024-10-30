<?php

namespace App\Livewire\Dashboard;

use App\Livewire\DataTable\WithBulkActions;
use App\Livewire\DataTable\WithCachedRows;
use App\Livewire\DataTable\WithPerPagePagination;
use App\Livewire\DataTable\WithSorting;
use App\Models\MataPelajaran;
use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

class Users extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    #[Layout('components.layouts.account_page')]
    public $filters = [
        'search' => '',
        'status' => '',
        'created_at' => '',
        'roles' => [],
        'mapel' => [],
    ];
    protected $queryString = ['sorts'];

    public $request = [
        'name' => null,
        'email' => null,
        'status' => null,
        'roles' => null
    ];


    public bool $showFilters = false;
    // protected $listeners = ['refreshTransactions' => '$refresh'];

    public array $breadcumb = [];
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $type = [];
    public $label_type = [];
    public User $editingUser;

    #[On('description')]
    public function updateDescription($content)
    {
        $this->editing['description'] = $content;
    }
    public function rules()
    {
        $userId = $this->editingUser->id;

        // dd($userId);
        return [
            'request.name' => 'required|min:3',
            'request.email' => 'required|email:dns|unique:users,email,'. $userId,
            'request.roles' => 'required',
            'request.status' => 'required|in:' . collect(User::STATUSES)->keys()->implode(','),
        ];
    }

    public function validationAttributes () {
        return [
            'request.name' => 'Nama Pengguna',
            'request.email' => 'Email',
            'request.roles' => 'Roles',
            'request.status' => 'Status',
        ];
    }
    public function mount($type = null)
    {
        if(!in_array($type,['teacher','student'])){
            abort(404);
        }

        $this->label_type = $type;
        if($type == 'teacher'){
            $this->type = [1,2,4];
        }else if($type == 'student'){
            $this->type = [3];
        }

        $this->editingUser = $this->makeBlankTransaction();
        $this->default_sorts = ['created_at' => 'desc'];
        $this->dispatch('tiny:init', ['editor' => '#editor']);
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

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    function makeBlankTransaction()
    {
        return User::make();
    }
    public function save()
    {
       try {
            $this->validate();
            $roles = $this->request['roles'];
            unset($this->request['roles']);
            if(!$this->editingUser->id){
                    $username = explode('@', $this->request['email'])[0];
                    $this->request['username'] = $username;
                    $this->request['password'] = bcrypt('password');

                    $this->editingUser->create($this->request)->each(function ($user) use ($roles) {
                        // Assign roles to the user
                        $user->roles()->sync($roles);
                    });
            }else{

                    // Update the user
                    $this->editingUser->fill($this->request);
                    $this->editingUser->save();

                    $this->editingUser->roles()->sync($roles);
                    $message = 'Succes update user '.$this->editingUser->name;
            }

            $this->notify($message ?? 'Succes create user '. $this->request['name']);
            $this->showEditModal = false;

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function create()
    {
        $this->dispatch('reinitSelect2');
        $this->editingUser = $this->makeBlankTransaction();
        $this->request = $this->editingUser->getAttributes();
        $this->showEditModal = true;
    }


    public function edit(User $user)
    {
        $this->useCachedRows();
        $this->dispatch('reinitSelect2');
        if ($this->editingUser->isNot($user)) $this->editingUser = $user;
        $this->request['name']  = $this->editingUser->name;
        $this->request['email'] = $this->editingUser->email;
        $this->request['status'] = $this->editingUser->status;
        $this->request['roles'] = array_column($this->editingUser->roles->toArray(),'id');
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
        $query = User::query()
            ->with('user_profile')
            ->with('mata_pelajaran')
            ->with('user_metodemengajar')

            ->when($this->filters['search'], fn($query, $status) => $query->where('name', 'like', '%' . $status . '%'))
            ->when($this->filters['status'], fn($query, $status) => $query->where('status', '=', $status ))
            ->when($this->filters['created_at'], function($query, $date) {
                $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                return $query->whereDate('created_at', $formattedDate);
            })
            ->when(!empty($this->type), function($query){
                $query->whereHas('roles', function ($querys) {
                    return $querys->whereIn('role_id', $this->type);
                });
            })
            ->when(!empty($this->filters['roles']), function($query){

                $query->whereHas('roles', function ($querys) {
                    return $querys->whereIn('role_id', $this->filters['roles']);
                });
            })
            ->when(!empty($this->filters['mapel']), function($query){

                $query->whereHas('mata_pelajaran', function ($querys) {
                    return $querys->whereIn('id', $this->filters['mapel']);
                });
            });
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
        return $this->applyPagination($this->rowsQuery);
        });
    }

    // public function create(){
    //     $this->showEditModal = true;
    //     $this->dispatch('reinitSelect2');
    // }
    public function render()
    {
        $roles = Role::whereIn('id',$this->type)->get();
        $mapel = MataPelajaran::all();
        $this->dispatch('tiny:init', ['editor' => '#editor']);
        return view('livewire.dashboard.users', [
            'users' => $this->rows,
            'breadcumb' => $this->breadcumb,
            'roles' => $roles,
            'mapel' => $mapel
        ]);
    }
}
