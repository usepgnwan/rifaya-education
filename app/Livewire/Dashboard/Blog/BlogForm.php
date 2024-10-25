<?php

namespace App\Livewire\Dashboard\Blog;

use App\Models\Category;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;



class BlogForm extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.account_page')]
    public $action;
    public $slug;
    public array $breadcumb = [];
    public $list_category = [];
    public $list_class = [];
    public $list_materi = [];

    #[Title('Blog Form')]

    public $form = [
        'title' => null,
        'body' => null,
        'image' => null,
        'class_id' => null,
        'category_id' => null,
        'materi_id' => [],
        'type' => null,
        'status' => null,
    ];

    public $post;
    public $_images = null;
    public function rules()
    {
        if( is_string($this->form['image']) ){
            $this->_images = $this->form['image'];
            $this->form['image'] = null;
        }
        return [
            'form.title' => 'required|min:4',
            'form.body' => 'required',
            'form.image' =>'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
            'form.status' => 'required|in:' . collect(Post::STATUSES)->keys()->implode(','),
            'form.type' => 'required|in:' . collect(Post::Type)->keys()->implode(','),
        ];
    }

    public function validationAttributes () {
        return [
            'form.title' => 'Judul',
            'form.body' => 'Content',
            'form.image' => 'Foto',
            'form.status' => 'Status',
            'form.type' => 'Tipe',
        ];
    }


    #[On('body')]
    public function updateBody($content)
    {
        $this->form['body'] = $content;
    }
    public function mount($action = 'create', $slug = null)
    {

        if ( $action =='edit') {
            $this->post = Post::where('slug', $slug)->with('user')->with('materi')->with('kelas')->with('kategori')->firstorFail();
            $Mypost = $this->post->toArray();

            array_walk_recursive($this->form, function (&$item, $key) use ($Mypost) {

                if (array_key_exists($key, $Mypost)) {
                    $item = $Mypost[$key];
                }

                if($key === 'category_id'){
                    $item = $Mypost['kategori']['id'] ?? null;
                }
                if($key === 'class_id'){
                    $item = $Mypost['kelas']['id'] ?? null;
                }

            });
            $this->form['materi_id'] = $this->post->materi->pluck('id')->toArray();
            // dd($this->form);
        }

        $this->slug = $slug;
        $this->action = $action;
            $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Blog' =>  [
                'active' => true,
                'route_name' => 'account.blog'
            ],
            ucfirst($action) =>  [
                'active' => false,
                'route_name' => ''
            ]
        ];

        $this->list_category = Category::get();
        $this->list_class = Kelas::get();
        $this->list_materi = Materi::get();
    }



    public function save()
    {
        try {

            $this->validate();
            $materi = $this->form['materi_id'];
            $this->form['user_id'] = auth()->user()->id;
            unset($this->form['materi_id']);
            // Handle image upload
            if (isset($this->form['image']) && is_string($this->form['image']) === false && !is_null($this->form['image'])) {
                // Check if this is an update and the post has an old image
                if ($this->post && $this->post->image) {
                    // Check if the old image exists in storage
                    // change /storage to ''

                    $prev_img = str_replace('/storage/', '', $this->post->image);

                    if (Storage::disk('public')->exists($prev_img)) {
                        // Delete the old image
                        Storage::disk('public')->delete($prev_img );
                    }
                }
                // Store the new image
                $this->form['image'] = $this->form['image']->store('images', 'public');

                // Generate the URL for the stored image
                $this->form['image'] = Storage::url($this->form['image']);
            } else {
                // If no new image is uploaded, retain the existing image URL
                $this->form['image'] =  $this->_images == 'remove' ? null : ($this->post->image ?? null);
            }

            if (is_null($this->post)) {
                // Create a new post
                Post::create($this->form)->each(function ($user) use ($materi) {
                    $user->materi()->sync($materi);
                });
                $message = 'Succes create Post ';
            } else {
                // Update existing post
                $this->post->fill($this->form);
                $this->post->save();
                $this->post->materi()->sync($materi);
                $message = 'Succes update Post ';
            }

            // Flash data to the session
            $this->notify($message, 'success', 'flash');

            // Redirect after saving
            return redirect()->route('account.blog');

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }

    public function render()
    {

        if(!in_array($this->action, ['create','edit'])){
            abort(404);
        }
        if($this->action == 'create' && $this->slug != null){
            abort(404);
        }
        return view('livewire.dashboard.blog.blog-form',[
            'breadcumb' => $this->breadcumb,
            'action' => $this->action,
            'category'=>$this->list_category,
            'kelas'=>$this->list_class,
            'materi'=>$this->list_materi
        ]);
    }
}
