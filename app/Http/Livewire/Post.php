<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Trix;

class Post extends Component
{
    public $title;
    //public $body = '<p>rad<img src="https://www.rochesterfirst.com/wp-content/uploads/sites/66/2019/09/cat.jpg"></p>';
    public $body;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value){
        $this->body = $value;
    }

    public function save(){
        dd([
            'title' => $this->title,
            'body' => $this->body
        ]);
    }

    public function render()
    {
        return view('livewire.post');
    }
}
