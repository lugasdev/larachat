<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatMessageForm extends Component
{

    public $pesan;

    public function submit()
    {
        $conversation['id']       = strtotime("now") . rand(100,999);
        $conversation['message']  = trim($this->pesan);
        $conversation['datetime'] = date("Y-m-d H:i:s");
        $conversation['user_id']  = session('user_id');
        $conversation['status']   = session('status');
        $conversation['kelas']    = session('kelas');
        $conversation['name']     = session('nama');
        $conversation['avatar']   = "https://avatars.dicebear.com/api/miniavs/{$conversation['name']}.svg?b=%23ffc800&size=64";

        // dd($conversation);

        $this->emit('addConversation', $conversation);
    }

    public function render()
    {
        return view('livewire.chat-message-form');
    }
}
