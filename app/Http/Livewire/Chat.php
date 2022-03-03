<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    public $chat_conversations = [];
    public $autoscroll = true;

    public function getListeners()
    {
        $channel_id = session('channel_id');

        return [
            "echo:channel_{$channel_id},ChatEvent" => 'notifChat',
            "addConversation",
            "toggleAutoScroll",
        ];
    }

    /**
     * change autoscroll status
     * @param boolean $status
     *
     * @return void
     * @author Lugas Luqman Hakim <lugas.luqman@gmail.com>
     */
    public function toggleAutoScroll($status)
    {
        $this->autoscroll = $status;
    }

    /**
     * chat notification
     * @param array $data
     *
     * @return void
     * @author Lugas Luqman Hakim <lugas.hakim@bpkp.go.id>
     */
    public function notifChat($data)
    {
        $this->addConversation($data);
    }

    public function addConversation($conversation_data)
    {
        $conversation_data['status'] = ($conversation_data['user_id'] == Auth::user()->id) ? 4 : $conversation_data['status'];

        $this->chat_conversations[] = $conversation_data;

        if ($this->autoscroll) {
            $this->emit('scrollToBottom');
        }

        return true;
    }

    public function render()
    {
        $data['participants'] = Conversation::select(DB::raw('id, stat, user_id, channel_id, max(updated_at) as updated_at'))
                                            ->where('channel_id', session('channel_id'))
                                            ->groupBy('user_id')
                                            ->orderBy('updated_at', 'desc')
                                            ->with('user')
                                            ->get();

        return view('livewire.chat', $data);
    }

}
