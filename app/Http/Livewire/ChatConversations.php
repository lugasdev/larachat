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
    public $reply_to = [];
    // public $id       = "";

    public function mount($conversation)
    {
        $this->status   = $conversation['status'];
        $this->name     = $conversation['name'];
        $this->avatar   = $conversation['avatar'];
        $this->datetime = $conversation['datetime'];
        $this->message  = $conversation['message'];
        $this->reply_to  = !empty($conversation['reply_to']) ? $conversation['reply_to'] : [];
    }

    public function render()
    {
        return view('livewire.chat-conversations');
    }

    public function addReply($name, $message)
    {
        $this->emit('addReplyTo', $name, $message);
        $this->emit('focusInputMessage');
    }
}
