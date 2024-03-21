<div class="modal">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2 class="modal-title">Create Client</h2>
            {{-- <button @click="isOpen = false" class="modal-close">X</button> --}}
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="store()">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" wire:model="first_name" class="form-control" id="name" placeholder="Enter first name">
                    @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" wire:model="last_name" class="form-control" id="name" placeholder="Enter last name">
                    @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" wire:model="date_of_birth" class="form-control" id="dob" placeholder="Enter date of birth">
                    @error('date_of_birth') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="length">Length</label>
                    <input type="text" wire:model="length_cm" class="form-control" id="length" placeholder="Enter length">
                    @error('length_cm') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" wire:model="email" class="form-control" id="email" placeholder="Enter email">
                    @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" wire:model="photo" class="form-control" id="photo" placeholder="Enter photo">
                    @error('photo') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    </div>
</div>
