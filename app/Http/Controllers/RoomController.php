<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|string|max:255',
            'number_of_seats' => 'required|integer',
            'floor' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'allocated' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['allocated'] = $request->allocated ? explode(',', $request->allocated) : null;

        Room::create($data);
        return redirect()->route('rooms')->with('success', 'Room added successfully.');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_no' => 'required|string|max:255',
            'number_of_seats' => 'required|integer',
            'floor' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'allocated' => 'nullable|string',
        ]);

        $room = Room::findOrFail($id);
        $data = $request->all();
        $data['allocated'] = $request->allocated ? explode(',', $request->allocated) : null;

        $room->update($data);
        return redirect()->route('rooms')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms')->with('success', 'Room deleted successfully.');
    }
}
