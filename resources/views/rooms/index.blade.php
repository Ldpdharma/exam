@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>Rooms</h3>
       
    </div>
    <div class="app-content">
        
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <label for="rowCount" class="form-label me-2">Show</label>
                        <select id="rowCount" class="form-select d-inline-block w-auto">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label for="rowCount" class="form-label ms-2">entries</label>
                    </div>
                    <div>
                        <input type="text" id="searchFilter" class="form-control d-inline-block w-auto" placeholder="Search...">
                    </div>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-rooms'))
                        <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Room
                        </a>
                    @endif
                </div>
                <table class="table table-striped table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Room No</th>
                            <th>Number of Seats</th>
                            <th>Floor</th>
                            <th>Block</th>
                            <th>Allocated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room->room_no }}</td>
                                <td>{{ $room->number_of_seats }}</td>
                                <td>{{ $room->floor }}</td>
                                <td>{{ $room->block }}</td>
                                <td>{{ implode(', ', $room->allocated ?? []) }}</td>
                                <td>
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('update-rooms'))
                                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete-rooms'))
                                        <form action="{{ route('rooms.delete', $room->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin: 0 8px !important; /* Add proper spacing between buttons */
        padding: 6px 12px !important;
        border-radius: 5px !important;
        border: 1px solid #ddd !important;
        background-color: #f8f9fa;
        color: #333;
        transition: background-color 0.3s, color 0.3s;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #007bff;
        color: #fff;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        const table = $('.table').DataTable({
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                paginate: {
                    previous: '<i class="bi bi-arrow-left"></i>',
                    next: '<i class="bi bi-arrow-right"></i>'
                }
            }
        });

        $('#rowCount').on('change', function() {
            table.page.len($(this).val()).draw();
        });

        $('#searchFilter').on('keyup', function() {
            table.search($(this).val()).draw();
        });
    });
</script>
@endpush
