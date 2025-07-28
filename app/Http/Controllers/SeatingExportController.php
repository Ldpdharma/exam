<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SeatingOrderExport;
use Maatwebsite\Excel\Facades\Excel;

class SeatingExportController extends Controller
{
    public function exportSeatingOrder(Request $request)
    {
        $students = $request->input('students', []);
        
        // Convert array to collection and add required fields
        $seatedStudents = collect($students)->map(function ($student, $index) {
            return (object)[
                'Serial Number' => $index + 1,
                'Student Name' => $student->name,
                'Register Number' => $student->register_number,
                'Department' => $student->department,
                'Year' => $student->year,
                'Room Number' => $student->room_number,
                'Seat Number' => $student->seat_number,
                'Bench Number' => $student->bench_number
            ];
        });
        
        return Excel::download(new SeatingOrderExport($seatedStudents), 'seating_order.xlsx');
    }
}
