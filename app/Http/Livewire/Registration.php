<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registration extends Component
{
    public $name;
    public $channel;
    public $role;

    protected $rules = [
        'name'    => 'required',
        'channel' => 'required',
        'role'    => 'required',
    ];

    public function submit()
    {
        $this->validate();

        session([
            'channel'   => $this->channel,
        ]);

        $user = User::updateOrCreate([
                        'name' => $this->name,
                    ], [
                        'email'    => rand(100,9999) . "@email.com",
                        'password' => Hash::make('password'),
                        'role'     => $this->role,
                        'avatar'   => "https://avatars.dicebear.com/api/open-peeps/{$this->name}.svg?b=%23ffc800&size=64",
                    ]);

        Auth::loginUsingId($user->id, true);

        $channel = Channel::firstOrCreate([
                            'name' => $this->channel
                        ]);

        Conversation::create([
            'stat' => '0',
            'user_id' => Auth::user()->id,
            'channel_id' => $channel->id
        ]);

        session([
            'channel_id' => $channel->id,
        ]);

        return redirect()->to('/chat');
    }

    public function render()
    {
        return view('livewire.registration');
    }
}
