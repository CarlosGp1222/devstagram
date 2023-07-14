<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $islike;
    public $likes;

    public function mount()
    {
        $this->islike = $this->post->checkLike(auth()->user());
        $this->likes = $this->post->likes->count();
    }
    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->islike = false;
            $this->likes--;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->islike = true;
            $this->likes++;
        }
        
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
