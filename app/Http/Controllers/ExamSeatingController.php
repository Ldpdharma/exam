<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\Facades\DataTables; // Add this import

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
            'department' => 'nullable|string',
            'year' => 'nullable|integer',
            'regno_start' => 'nullable|string',
            'regno_end' => 'nullable|string',
        ]);

        // Normalize input values
        $department = $validated['department'] ?? null;
        $year = $validated['year'] ?? null;
        $regno_start = $validated['regno_start'] ?? null;
        $regno_end = $validated['regno_end'] ?? null;

        // Build the query
        $query = \App\Models\Student::query();

        if ($department) {
            $query->where('department', $department);
        }

        if ($year) {
            $query->where('year', $year);
        }

        if ($regno_start && $regno_end) {
            $query->whereBetween('register_number', [$regno_start, $regno_end]);
        } elseif (!$regno_start && !$regno_end) {
            $query->whereNotNull('register_number');
        }

        // Fetch all students if no filters are applied
        $students = $query->get();

        // Log the fetched students for debugging
       // Log::info('Fetched Students:', $students->toArray());

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
       // \Log::info('Fetched Students:', $students->toArray());


        // Return the data as JSON
        return response()->json($students);
    }

    public function getStudentDataForSeating()
    {
        $students = Student::select(['id', 'name', 'student_id', 'department', 'year', 'batch', 'email']);
        return DataTables::of($students)
            ->addColumn('actions', function ($student) {
                return '<button class="btn btn-danger btn-sm remove-row">Remove</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * API endpoint to filter students based on criteria (department, year, regno_start, regno_end)
     */
    public function getFilteredStudents(Request $request)
    {
        // Accept both camelCase and snake_case keys for compatibility
        $department = $request->input('department');
        $year = $request->input('year');
        $regno_start = $request->input('regno_start') ?? $request->input('regnoStart');
        $regno_end = $request->input('regno_end') ?? $request->input('regnoEnd');

        $query = Student::query();
        if ($department) {
            $query->where('department', $department);
        }
        if ($year) {
            $query->where('year', $year);
        }
        if ($regno_start && $regno_end) {
            $query->whereBetween('register_number', [$regno_start, $regno_end]);
        }
        $students = $query->orderBy('register_number')->get();
        return response()->json($students);
    }

    /**
     * API endpoint to generate seating plan based on students and seating order
     * seatingOrder: linear, zigzag, column
     * rooms: number of rooms (optional)
     */
    public function generateSeatingPlan(Request $request)
    {
        $students = $request->input('students', []);
        $seatingOrder = $request->input('seatingOrder', 'linear');
        $rooms = (int) $request->input('rooms', 1);
        $benchesPerRoom = 15; // Example: 15 benches per room
        $seating = [];
        $seatNumber = 1;
        $studentChunks = array_chunk($students, $benchesPerRoom * $rooms);
        foreach ($studentChunks as $roomIndex => $roomStudents) {
            $roomSeating = [];
            if ($seatingOrder === 'zigzag') {
                $roomStudents = collect($roomStudents)->chunk(3)->map(function($chunk, $i) {
                    return $i % 2 === 1 ? $chunk->reverse()->values() : $chunk->values();
                })->flatten(1)->values()->all();
            } elseif ($seatingOrder === 'column') {
                $columns = [[], [], []];
                foreach ($roomStudents as $i => $student) {
                    $columns[$i % 3][] = $student;
                }
                $roomStudents = array_merge(...$columns);
            }
            foreach ($roomStudents as $student) {
                $student['seat_number'] = $seatNumber++;
                $roomSeating[] = $student;
            }
            $seating[] = $roomSeating;
        }
        return response()->json($seating);
    }

    /**
     * Download filtered students as Excel
     */
    public function downloadExcel(Request $request)
    {
        $students = $this->getFilteredStudents($request)->getData();
        // Use Laravel Excel or similar package for real export
        // For now, return JSON as a placeholder
        return response()->json(['download' => true, 'students' => $students]);
    }

    /**
     * Print view for filtered students
     */
    public function printView(Request $request)
    {
        $students = $this->getFilteredStudents($request)->getData();
        return view('exam-seating.print', ['students' => $students]);
    }
    /**
     * API endpoint to filter students based on multiple criteria sets
     */
    public function filterMulti(Request $request)
    {
        $filters = $request->input('filters', []);
        $students = collect();
        foreach ($filters as $filter) {
            $query = Student::query();
            if (!empty($filter['department']) && $filter['department'] !== 'all') {
                $query->where('department', $filter['department']);
            }
            if (!empty($filter['year']) && $filter['year'] !== 'all') {
                $query->where('year', $filter['year']);
            }
            if (!empty($filter['regno_start']) && !empty($filter['regno_end']) && $filter['regno_start'] !== 'all' && $filter['regno_end'] !== 'all') {
                $query->whereBetween('register_number', [$filter['regno_start'], $filter['regno_end']]);
            }
            $students = $students->merge($query->get());
        }
        // Remove duplicates and sort by department and year
        $students = $students->unique('id')->sortBy([['department', 'asc'], ['year', 'asc']]);
        // Return only required fields for studentsArray
        $result = $students->map(function($student) {
            return [
                $student->name,
                $student->register_number,
                $student->department,
                $student->year
            ];
        })->values();
        return response()->json($result);
    }
}
