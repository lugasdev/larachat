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
    public $nama;
    public $kelas;
    public $status;

    protected $rules = [
        'nama' => 'required',
        'kelas' => 'required',
        'status' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        session([
            'kelas'   => $this->kelas,
        ]);

        $user = User::updateOrCreate([
                        'name' => $this->nama,
                    ], [
                        'email'    => rand(100,9999) . "@email.com",
                        'password' => Hash::make('password'),
                        'role'     => $this->status,
                        'avatar'   => "https://avatars.dicebear.com/api/open-peeps/{$this->nama}.svg?b=%23ffc800&size=64",
                    ]);

                    // dd($user->id);

        Auth::loginUsingId($user->id, true);

        $channel = Channel::firstOrCreate([
                            'name' => $this->kelas
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
