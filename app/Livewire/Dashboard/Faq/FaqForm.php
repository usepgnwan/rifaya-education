<?php

namespace App\Livewire\Dashboard\Faq;

use App\Models\Faq;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class FaqForm extends Component
{

    #[Layout('components.layouts.account_page')]

    #[Title('Q&A Form')]

    public $form = [
        'title' => null,
        'body' => null,
    ];
    public $action;
    public $data;
    public array $breadcumb = [];

    public function rules()
    {

        return [
            'form.title' => 'required|min:4',
            'form.body' => 'required',
        ];
    }

    public function validationAttributes () {
        return [
            'form.title' => 'Pertanyaan',
            'form.body' => 'Jawaban',
        ];
    }
    #[On('body')]
    public function updateBody($content)
    {
        $this->form['body'] = $content;
    }
    public function mount($action = 'create', $id = null)
    {

        if ( $action =='edit') {
            $this->data = Faq::where('id', $id)->firstorFail();
            $_data = $this->data->toArray();

            array_walk_recursive($this->form, function (&$item, $key) use ($_data) {

                if (array_key_exists($key, $_data)) {
                    $item = $_data[$key];
                }

                if($key === 'category_id'){
                    $item = $_data['kategori']['id'] ?? null;
                }
                if($key === 'class_id'){
                    $item = $_data['kelas']['id'] ?? null;
                }

            });
            // dd($this->form);
        }


        $this->action = $action;
            $this->breadcumb = [
            'Home' => [
                'active' => true,
                'route_name' => 'account.dashboard'
            ],
            'Q&A' =>  [
                'active' => true,
                'route_name' => 'account.master.qa'
            ],
            ucfirst($action) =>  [
                'active' => false,
                'route_name' => ''
            ]
        ];

    }
    public function save()
    {
        try {

            $this->validate();

            if (is_null($this->data)) {
                // Create a new post
                Faq::create($this->form);
                $message = 'Succes create Q&A ';
            } else {
                // Update existing Q&A
                $this->data->fill($this->form);
                $this->data->save();
                $message = 'Succes update Q&A ';
            }

            // Flash data to the session
            $this->notify($message, 'success', 'flash');

            // Redirect after saving
            return redirect()->route('account.master.qa');

        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->notify('Periksa kembali form isian', 'warning');

            throw $e;
        }
    }
    public function render()
    {
        return view('livewire.dashboard.faq.faq-form',[
            'breadcumb' => $this->breadcumb,
            'action' => $this->action,
        ]);
    }
}
