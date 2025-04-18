<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ExamSeatingController extends Controller
{
    public function index(Request $request)
    {
        $students = $request->get('students', []); // Default to an empty array if no students are passed
        return view('exam-seating.index', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'rows' => 'required|array',
            'rows.*.department' => 'nullable|string',
            'rows.*.year' => 'nullable|integer',
            'rows.*.regno_start' => 'nullable|string',
            'rows.*.regno_end' => 'nullable|string',
        ]);

        $students = collect();

        // Process each row from the subform table
        foreach ($validated['rows'] as $row) {
            $query = Student::query();

            if (!empty($row['department'])) {
                $query->where('department', $row['department']);
            }

            if (!empty($row['year'])) {
                $query->where('year', $row['year']);
            }

            if (!empty($row['regno_start']) && !empty($row['regno_end'])) {
                $query->whereBetween('register_number', [$row['regno_start'], $row['regno_end']]);
            }

            $students = $students->merge($query->get());
        }

        // Remove duplicates
        $students = $students->unique('id');

        // Return the view with the filtered student data
        return view('exam-seating.index', compact('students'));
    }

    public function getStudentsByDepartmentAndYear(Request $request)
    {
        $validated = $request->validate([
            'department' => 'required|string',
            'year' => 'required|integer',
            'regno_start' => 'required|integer',
            'regno_end' => 'required|integer',
        ]);

       
    }
    public function getStudents()
    {
        // Fetch all students from the database
        $students = Student::
            select('id', 'name', 'student_id', 'department', 'year', 'batch', 'gender', 'register_number')
            ->get();    
        // Debugging: Log the fetched students
        \Log::info('Fetched Students:', $students->toArray());


        // Return the data as JSON
        return response()->json($students);
    }
    
}
