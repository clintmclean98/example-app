<div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <button wire:click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create Client</button>

    <table id="clientsTable" class="table table-bordered w-full">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->created_at }}</td>
                <td>{{ $client->updated_at }}</td>
                <td>
                    <button wire:click="edit({{ $client->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                    <button wire:click="delete({{ $client->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    <button wire:click="measurements({{ $client->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Measurement</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <button wire:click="openModal" class="btn btn-primary">Open Modal</button>

        @if ($isOpen)
        <div class="modal" style="display:block;">
            <div class="modal-dialog">
                <div class="modal-header">
                    <h2 class="modal-title">Create measurement</h2>
                    <button type="button" wire:click="closeModal" class="btn-close" aria-label="Close"></button>
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#clientsTable').DataTable();
    });
</script>
