<div>
    <form wire:submit.prevent="submit" >
        @if (!empty($reply_to_name))
            <div class="card reply-to fade show">
                <div class="card-body">
                    <button class="btn btn-dark btn-sm btn-del-reply" wire:click="deleteReplyTo" type="button"><i class="fa-solid fa-xmark"></i></button>
                    <p>{{ __('Reply to') }}: {{ $reply_to_name }}</p>
                    <p>{{ $reply_to_message }}</p>
                </div>
            </div>
        @endif
        <div class="chat-rep-form">
            <input autocomplete="off" type="text" placeholder="{{ __('Type a message') }}" wire:model.lazy="pesan" class="form-control" id="inputMessage" >

            <button type="submit" class="btn btn-primary btn-submit">{{ __('Send') }} <i class="fa-solid fa-paper-plane"></i></button>
            <button type="button" wire:click="toggleAutoScroll()" class="btn btn-warning btn-autoscroll" id="btn-autoscroll" data-bs-toggle="tooltip" data-bs-placement="top" title="Auto Scroll to Bottom">
                @if ($autoscroll)
                    <i class="fa-solid fa-down-long"></i>
                @else
                    <i class="fa-solid fa-times"></i>
                @endif
            </button>
        </div>
    </form>
</div>
