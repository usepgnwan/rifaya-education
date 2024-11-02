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
            $promo = $post
                        ->with(['kelas.jenjang' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->with(['materi' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->with(['kategori' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->where(function ($query) {
                            $query->where('type', '<>', 'private')
                            ->whereHas('kategori', function ($query) {
                                $query->where('id', '=', 5);
                            });
                        })
                        ->inRandomOrder()->limit(2)->get();
            if($k == 'artikel'){

                $data = $post->where('category_id','=','1')
                        ->with(['kelas.jenjang' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->where(function ($query) {
                            $query->where('type', '<>', 'private');
                        })
                        ->with(['kategori' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        ->with(['materi' => function ($query) {
                            $query->select('id', 'title');
                        }])
                        // ->where(function ($query) {
                        //     $query->whereHas('materi', function ($query) {
                        //         $query->where('id', '<>', 6);
                        //     })->orWhereDoesntHave('materi');
                        // })
                        ->inRandomOrder()->limit(6)->get();


            }else if($k == 'to'){
                $data = $post->where('category_id','=','2')
                ->with(['kelas.jenjang' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->with(['kategori' => function ($query) {
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
                ->with(['kategori' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->with(['materi' => function ($query) {
                    $query->select('id', 'title');
                }])
                ->latest()->limit(6)->get();
            }

            if ($promo && $k == 'artikel') {
                $data = $promo->merge($data); // Add the promo post at the beginning of the collection
            }

            $_type[$k]['data'] = $data ?? [];
        }


        // Log::info('Emitting swiperInitialized event');
        $this->dispatch('swiperInitialized');
        return view('livewire.front.partials.top-articels', compact('_type'));
    }
}
