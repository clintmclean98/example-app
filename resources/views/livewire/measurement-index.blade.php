<div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <x-secondary-button wire:click="openModal">Create Measurement</x-secondary-button>

    <table id="measurementTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Weight in Kilos</th>
                <th>Fat Percentage</th>
                <th>Blood Pressure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($measurements as $measurement)
                <tr>
                    <td>{{ $measurement->weight }}</td>
                    <td>{{ $measurement->fat_percentage }}</td>
                    <td>{{ $measurement->blood_pressure }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($isOpen)
        @include('measurements.create')
    @endif
</div>

<script>
    $(document).ready(function() {
        $('#measurementTable').DataTable();
    });
</script>
