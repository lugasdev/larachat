<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatConversations extends Component
{
    public $status   = 0;
    public $name     = "";
    public $avatar   = "";
    public $datetime = "";
    public $message  = "";
    // public $id       = "";

    public function mount($conversation)
    {
        // dd($conversation);
        // $this->id   = $conversation['id'];
        $this->status   = $conversation['status'];
        $this->name     = $conversation['name'];
        $this->avatar   = $conversation['avatar'];
        $this->datetime = $conversation['datetime'];
        $this->message  = $conversation['message'];
    }

    public function render()
    {
        return view('livewire.chat-conversations');
    }
}
