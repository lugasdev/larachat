<div>
    <div class="card my-4">
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="inputName" class="form-label">{{ __('Full Name') }}</label>
                    <input type="text" wire:model="name" name="name" class="form-control" id="inputName" >
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="inputChannel" class="form-label">{{ __('Channel Name') }}</label>
                    <input type="text" wire:model="channel" name="channel" class="form-control" id="inputChannel" >
                    @error('channel') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="inputRole" class="form-label">{{ __('Role') }}</label>
                    <select wire:model="role" name="role" id="inputRole" class="form-control">
                        <option value="">Select Role</option>
                        <option value="2">Student</option>
                        <option value="1">Instructure</option>
                    </select>
                    {{-- // 1: wi, 2: peserta, 3: panitia, 4: me, 5: notif --}}
                    @error('role') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
