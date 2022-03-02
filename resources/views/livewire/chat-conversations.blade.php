<li class="list-group-item">
    <div class="conversation-list {{ converStatus($status) }}">
        <img class="ava" src="{{ $avatar }}" alt="{{ $name }}" >
        <div class="chat-content">
            <div class="bubble">
                <div class="sender">{{ $name }}</div>
                <div class="msg">
                    {{ $message }}
                </div>
            </div>
            <div class="send-time">
                {{ date("H:i", strtotime($datetime)) }}
            </div>
        </div>
    </div>
</li>
