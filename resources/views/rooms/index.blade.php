@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>Rooms</h3>
       
    </div>
    <div class="app-content">
        
        <div class="card">
            <div class="card-body">
            @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-rooms'))
            <a href="{{ route('rooms.create') }}" class="btn btn-primary float-end mb-2">
                <i class="bi bi-plus-circle"></i> Add Room
            </a>
        @endif
                <table class="table table-bordered table-hover">
                    <thead>
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
