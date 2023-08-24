<?php

namespace App\Http\Livewire;

use App\Models\Like as ModelsLike;
use App\Models\Post;
use Livewire\Component;

class Like extends Component
{
    public Post $post;

    protected $listeners = ['refreshComponent' => '$refresh'];

 
    public function mount(Post $post)
    {
        $this->post = $post;

    }

    public function like()
    {
        if(auth()->check()){
            if ($this->post->isLiked()) {
                $this->post->removeLike();
                $this->emit('refreshComponent');

            } else{
                ModelsLike::create([
                    'post_id' => $this->post->id,
                    'user_id' => auth()->user()->id,
                    'like' => 1,
                ]);

                $this->emit('refreshComponent');
            }
        }else{
            return redirect()->route('login');
        }
    }

    

    public function render()
    {
        return view('livewire.like');
    }
}
