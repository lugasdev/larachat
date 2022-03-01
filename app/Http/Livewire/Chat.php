<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    protected $listeners = ['echo:channelname_1,ChatEvent' => 'notifyNewOrder'];

    public function notifyNewOrder($data)
    {
        dd($data);
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
