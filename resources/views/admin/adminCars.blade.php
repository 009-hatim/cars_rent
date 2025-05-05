<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Vehicle Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <h1 class="my-4">Vehicle Management</h1>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Vehicles List</h3>
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
                    <i class="fas fa-plus"></i> Add Vehicle
                </button>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Capacity</th>
                            <th>Rate (€/day)</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicules as $vehicule)
                        <tr>
                            <td>{{ $vehicule->id }}</td>
                            <td>{{ $vehicule->marque }}</td>
                            <td>{{ $vehicule->model }}</td>
                            <td>{{ $vehicule->capacite }} persons</td>
                            <td>{{ number_format($vehicule->tarif, 2) }} €</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input availability-toggle" type="checkbox"
                                        data-vehicule-id="{{ $vehicule->id }}"
                                        {{ $vehicule->disponibilite ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $vehicule->disponibilite ? 'Available' : 'Unavailable' }}
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="/admin/vehicules/{{ $vehicule->id }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <button class="btn btn-sm btn-warning edit-vehicle"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editVehicleModal"
                                    data-vehicule="{{ json_encode($vehicule) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Vehicle Modal -->
    <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicules.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="marque" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="marque" name="marque" required>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacite" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacite" name="capacite" required>
                        </div>
                        <div class="mb-3">
                            <label for="tarif" class="form-label">Rate (€/day)</label>
                            <input type="number" step="0.01" class="form-control" id="tarif" name="tarif" required>
                        </div>
                        <div class="mb-3">
                            <label for="options" class="form-label">Options</label>
                            <textarea class="form-control" id="options" name="options" rows="3"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="disponibilite" name="disponibilite" checked>
                            <label class="form-check-label" for="disponibilite">Available</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Vehicle Modal -->
    <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVehicleModalLabel">Edit Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editVehicleForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_marque" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="edit_marque" name="marque" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="edit_model" name="model" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_capacite" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="edit_capacite" name="capacite" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tarif" class="form-label">Rate (€/day)</label>
                            <input type="number" step="0.01" class="form-control" id="edit_tarif" name="tarif" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_options" class="form-label">Options</label>
                            <textarea class="form-control" id="edit_options" name="options" rows="3"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="edit_disponibilite" name="disponibilite">
                            <label class="form-check-label" for="edit_disponibilite">Available</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle edit button click
            $('.edit-vehicle').click(function() {
                const vehicule = JSON.parse($(this).attr('data-vehicule'));
                const form = $('#editVehicleForm');
                form.attr('action', `/admin/vehicules/${vehicule.id}`);

                $('#edit_marque').val(vehicule.marque);
                $('#edit_model').val(vehicule.model);
                $('#edit_capacite').val(vehicule.capacite);
                $('#edit_tarif').val(vehicule.tarif);
                $('#edit_options').val(vehicule.options);
                $('#edit_disponibilite').prop('checked', vehicule.disponibilite);
            });

            // Handle availability toggle
            $('.availability-toggle').change(function() {
                const vehiculeId = $(this).data('vehicule-id');
                const isAvailable = $(this).is(':checked');

                $.ajax({
                    url: `/admin/vehicules/${vehiculeId}/toggle-availability`,
                    method: 'PATCH',
                    data: {
                        disponibilite: isAvailable,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error updating availability');
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
