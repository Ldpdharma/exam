@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>Edit Room</h3>
    </div>
    <div class="app-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="room_no" class="form-label">Room No</label>
                        <input type="text" name="room_no" class="form-control" value="{{ old('room_no', $room->room_no) }}" required>
                        @error('room_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="allocated" class="form-label">Allocated</label>
                        <input type="text" name="allocated[]" class="form-control" placeholder="Enter allocated values separated by commas" value="{{ old('allocated') }}">
                        @error('allocated')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="number_of_seats" class="form-label
