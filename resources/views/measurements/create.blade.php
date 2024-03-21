<div class="modal" >
    <div class="modal-dialog">
        <div class="modal-header">
            <h2 class="modal-title">Create measurement</h2>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="store">


                <div class="form-group">
                    <label for="weight">Weight in Kilos</label>
                    <input type="text" wire:model="weight_kg" class="form-control" id="weight" placeholder="Enter weight in kilos">
                    @error('weight_kg') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="fat_percentage">Fat percentage</label>
                    <input type="text" wire:model="fat_percentage" class="form-control" id="fat_percentage" placeholder="Enter fat percentage">
                    @error('fat_percentage') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="blood_pressure">Blood pressure</label>
                    <input type="text" wire:model="blood_pressure" class="form-control" id="blood_pressure" placeholder="Enter blood pressure">
                    @error('blood_pressure') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:click="store()">Submit</button>
            </form>
        </div>
    </div>
</div>
