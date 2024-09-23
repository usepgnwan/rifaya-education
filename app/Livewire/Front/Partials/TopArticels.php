<?php

namespace App\Livewire\Front\Partials;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class TopArticels extends Component
{
    #[Lazy]
    public bool $title = false;
    public array $type = [];
    public int $count = 4;
    public array $post = [];

    public function placeholder(){
        // return <<<BLADE
        //     <div>
        //     Loading...
        //     </div>
        // BLADE;

        $params = [
            "_title" =>$this->title != false ? $this->title : '',
            "type" => $this->type,
            "count" => $this->count,
        ];

        return view('livewire.front.partials.sceleton.top-articel',$params);
    }

    public function render()
    {
        $_type = [];
        $post = new Post;
        foreach($this->type as $k => $title){
            $_type[$k]['title'] = $title;
            $_type[$k]['status'] = $this->title;
            if($k == 'artikel'){
                $data = $post->where('category_id','=','1')
                        ->with(['kelas.jenjang' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->with(['materi' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->inRandomOrder()->limit(6)->get();


            }else if($k == 'to'){
                $data = $post->where('category_id','=','2')
                ->with(['kelas.jenjang' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->with(['materi' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->latest()->limit(6)->get();
            }else{
                $data = $post->where('category_id','=','4')
                ->with(['kelas.jenjang' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->with(['materi' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->latest()->limit(6)->get();
            }
            $_type[$k]['data'] = $data ?? [];
        }


        // Log::info('Emitting swiperInitialized event');
        $this->dispatch('swiperInitialized');
        return view('livewire.front.partials.top-articels', compact('_type'));
    }
}
