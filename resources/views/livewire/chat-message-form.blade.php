<div>
    <form wire:submit.prevent="submit" class="chat-rep-form">
        <input type="text" wire:model="pesan" name="nama" class="form-control" id="inputNama" >

        {{-- <input placeholder="Tulis pesan balasan disini..." wire:model="message" type="text" class="form-control"> --}}
        <button type="submit" class="btn btn-primary btn-submit">Kirim <i class="fa-solid fa-paper-plane"></i></button>
    </form>
</div>
