<div class="row my-4" id="chat-page">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="list-group chat-person-list">
                    <a href="#" class="list-group-item list-group-item-action p-0" aria-current="true">
                        <img class="ava" src="{{ Auth::user()->avatar }}" alt="" srcset="">
                        <div class="bio">
                            <p class="name">{{ Auth::user()->name }}</p>
                            <p class="stat">{{ ucwords(converStatusFull(Auth::user()->role)) }}</p>
                        </div>
                        {{-- <p class="m-0 last-respose-time">09:00</p> --}}
                    </a>
                  </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body p-0">
                <div class="list-group chat-person-list">
                    @foreach ($participants as $participant)
                        <a href="#" class="list-group-item p-0">
                            <img class="ava" src="{{ $participant->user->avatar }}" alt="{{ $participant->user->name }}" >
                            <div class="bio">
                                <p class="name">{{ $participant->user->name }}</p>
                                <p class="stat">{{ converStatusFull($participant->user->role) }}</p>
                            </div>
                            <p class="m-0 last-respose-time">{{ date("H:i", strtotime($participant->updated_at)) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body chat-body">
                <div class="row">
                    <div class="col-md-12 chat-conversation">
                        <ul class="list-group list-group-unstyle">
                            @foreach ($chat_conversations as $conversation)
                                <livewire:chat-conversations :wire:key="$loop->index" :conversation="$conversation" />
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <livewire:chat-message-form/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
