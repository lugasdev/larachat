require('./bootstrap');


import 'bootstrap';

// or get all of the named exports for further usage
import * as bootstrap from 'bootstrap';

if (document.getElementById('btn-autoscroll') != null) {
    new bootstrap.Tooltip(document.getElementById('btn-autoscroll'));
}

Livewire.on('scrollToBottom', () => {
    document.querySelector('.chat-conversation').scrollTo({ top: document.querySelector('.chat-conversation').scrollHeight, behavior: 'smooth' })
})

Livewire.on('focusInputMessage', () => {
    if (document.getElementById('inputMessage') != null) {
        document.getElementById("inputMessage").focus();
    }
    // document.querySelector('.chat-conversation').scrollTo({ top: document.querySelector('.chat-conversation').scrollHeight, behavior: 'smooth' })
})
