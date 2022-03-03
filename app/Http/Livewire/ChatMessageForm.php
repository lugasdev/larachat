<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ChatMessageForm extends Component
{
    public $autoscroll = true;

    public $pesan;
    public $reply_to_name;
    public $reply_to_message;

    public function getListeners()
    {
        return [
            "addReplyTo",
        ];
    }

    public function addReplyTo($name, $message)
    {
        // dd('addReplyTo ', $name, $message);
        $this->reply_to_name    = $name;
        $this->reply_to_message = $message;
    }

    public function deleteReplyTo()
    {
        $this->reply_to_name    = "";
        $this->reply_to_message = "";

        $this->emit('focusInputMessage');
    }

    public function submit()
    {
        $id = Cache::increment('chat_key_' . session('channel_id'));

        $conversation['id']       = strtotime("now") . $id;
        $conversation['message']  = trim($this->pesan);
        $conversation['datetime'] = date("Y-m-d H:i:s");
        $conversation['user_id']  = Auth::user()->id;
        $conversation['status']   = Auth::user()->role;
        $conversation['chat_id']  = session('channel_id');
        $conversation['name']     = Auth::user()->name;
        $conversation['avatar']   = "https://avatars.dicebear.com/api/open-peeps/{$conversation['name']}.svg?b=%23ffc800&size=64";

        if (!empty($this->reply_to_name)) {
            $conversation['reply_to']['name']    = $this->reply_to_name;
            $conversation['reply_to']['message'] = $this->reply_to_message;
        }

        if (!empty($conversation['message'])) {
            $this->emit('addConversation', $conversation);

            broadcast(new ChatEvent($conversation))->toOthers();
        }

        $this->pesan            = "";
        $this->reply_to_name    = "";
        $this->reply_to_message = "";

        $this->emit('focusInputMessage');

        Conversation::create([
            'stat'       => '1',
            'user_id'    => Auth::user()->id,
            'channel_id' => session('channel_id'),
            'message'    => $conversation['message'],
            'is_reply'   => !empty($this->reply_to_name) ? '1' : '0',
        ]);
    }

    public function render()
    {
        return view('livewire.chat-message-form');
    }

    public function toggleAutoScroll()
    {
        $this->autoscroll = !$this->autoscroll;

        $this->emit('toggleAutoScroll', $this->autoscroll);

        $this->emit('focusInputMessage');
    }
}
