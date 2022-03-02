<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $chat_conversations = [];

    public function getListeners()
    {
        $kelas = session('kelas');

        return [
            "echo:channelname_{$kelas},ChatEvent" => 'notifChat',

            "addConversation"
        ];
    }

    public function notifChat($data)
    {
        dd($data);
    }

    public function addConversation($conversation_data)
    {
        // dd('xx' , $conversation_data);
        // $chat_conversations = $this->chat_conversations;

        $this->chat_conversations[] = $conversation_data;

        // dd($this->chat_conversations);

        return true;
    }

    // public function mount()
    // {
    //     $chat_conversation[0]['user_id']  = 1;
    //     $chat_conversation[0]['status']   = 1; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[0]['name']     = "Lugas Luqmanul Hakim";
    //     $chat_conversation[0]['avatar']   = "https://avatars.dicebear.com/api/miniavs/lugas.svg?b=%23ffc800&size=64";
    //     $chat_conversation[0]['datetime'] = "2022-02-03 09:01:22";
    //     $chat_conversation[0]['message']  = "Selamat Pagi Bapak Ibu Peserta Pelatihan";

    //     $chat_conversation[1]['user_id']  = 2;
    //     $chat_conversation[1]['status']   = 2; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[1]['name']     = "Amalia Septianti";
    //     $chat_conversation[1]['avatar']   = "https://avatars.dicebear.com/api/miniavs/Amalia Septianti.svg?b=%23ffc800&size=64";
    //     $chat_conversation[1]['datetime'] = "2022-02-03 09:02:02";
    //     $chat_conversation[1]['message']  = "Selamat Pagi Bapak";

    //     $chat_conversation[2]['user_id']  = 3;
    //     $chat_conversation[2]['status']   = 2; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[2]['name']     = "Anggi Saputra Lubis";
    //     $chat_conversation[2]['avatar']   = "https://avatars.dicebear.com/api/miniavs/Anggi S.svg?b=%23ffc800&size=64";
    //     $chat_conversation[2]['datetime'] = "2022-02-03 09:02:12";
    //     $chat_conversation[2]['message']  = "Selamat pagi juga pak";

    //     $chat_conversation[3]['user_id']  = 4;
    //     $chat_conversation[3]['status']   = 2; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[3]['name']     = "Dwi Putri";
    //     $chat_conversation[3]['avatar']   = "https://avatars.dicebear.com/api/miniavs/dwi putri.svg?b=%23ffc800&size=64";
    //     $chat_conversation[3]['datetime'] = "2022-02-03 09:02:30";
    //     $chat_conversation[3]['message']  = "Selamat pagi";

    //     $chat_conversation[4]['user_id']  = 5;
    //     $chat_conversation[4]['status']   = 4; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[4]['name']     = "Me";
    //     $chat_conversation[4]['avatar']   = "https://avatars.dicebear.com/api/miniavs/Lugas.svg?b=%23ffc800&size=64";
    //     $chat_conversation[4]['datetime'] = "2022-02-03 09:02:40";
    //     $chat_conversation[4]['message']  = "Morning";

    //     $chat_conversation[5]['user_id']  = 6;
    //     $chat_conversation[5]['status']   = 3; // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif
    //     $chat_conversation[5]['name']     = "Panitia";
    //     $chat_conversation[5]['avatar']   = "https://avatars.dicebear.com/api/miniavs/Panitia.svg?b=%23ffc800&size=64";
    //     $chat_conversation[5]['datetime'] = "2022-02-03 09:03:01";
    //     $chat_conversation[5]['message']  = "Pagiiii";

    //     $this->chat_conversations = $chat_conversation;
    // }

    public function render()
    {
        return view('livewire.chat');
    }

}
