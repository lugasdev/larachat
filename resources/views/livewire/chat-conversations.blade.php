<li class="list-group-item">
    <div class="conversation-list {{ converStatus($status) }}">
        <img class="ava" src="{{ $avatar }}" alt="{{ $name }}" >
        <div class="chat-content">
            <div class="bubble">
                @if (!empty($reply_to['name']))
                    <div class="card reply-from">
                        <div class="card-body">
                            <p class="text-muted">{{ $reply_to['name'] }}</p>
                            <p>{{ $reply_to['message'] }}</p>
                        </div>
                    </div>
                @endif
                <div class="sender">{{ $name }}</div>
                <div class="msg">
                    {{ $message }}
                </div>
            </div>
            <div class="send-time">
                {{ date("H:i:s", strtotime($datetime)) }}
            </div>
        </div>
        <button class="btn btn-sm btn-light btn-reply" wire:click="addReply('{{ $name }}', '{{ substr($message, 0, 100) }}')" title="Reply to" type="button">
            <i class="fa-solid fa-reply"></i>
        </button>
    </div>
</li>
