<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = '';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {

        $tweets = Tweet::with('user')->latest()->paginate(5);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {

        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => auth()->user()->id
        ]);

        $this->content = '';
    }

    public function like($tweet_id)
    {   
        $tweet = Tweet::find($tweet_id);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike($tweet_id)
    {   
        $tweet = Tweet::find($tweet_id);

        $tweet->likes()->delete();
    }

}