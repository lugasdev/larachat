<div>
    <div class="card my-4">
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" wire:model="nama" name="nama" class="form-control" id="inputNama" >
                    @error('nama') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <input type="number" wire:model="kelas" name="kelas" class="form-control" id="inputKelas" >
                    @error('kelas') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="inputStat" class="form-label">Status</label>
                    <select wire:model="status" name="status" id="inputStat" class="form-control">
                        <option value="">Select Status</option>
                        <option value="2">Peserta</option>
                        <option value="1">Widyaiswara</option>
                    </select>
                    {{-- // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif --}}
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
