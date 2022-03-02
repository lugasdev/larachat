<?php

namespace App\Http\Livewire;

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
            'user_id' => strtotime('now'),
            'nama'    => $this->nama,
            'kelas'   => $this->kelas,
            'status'  => $this->status,
        ]);

        return redirect()->to('/chat');
    }

    public function render()
    {
        return view('livewire.registration');
    }
}
