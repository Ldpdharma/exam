<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TeachersImport;
use Yajra\DataTables\Facades\DataTables; // Add this import

class StudentController extends Controller
{
    public function index()
    {
        // Allow access for admin or users with read-students permission
        if (auth()->user()->hasRole('admin') || auth()->user()->can('read-students')) {
            if (auth()->user()->hasRole('admin')) {
                $students = Student::all(); // Admin can view all students
            } else {
                $students = Student::where('user_id', auth()->id())->get(); // Regular users see their own students
            }

            $main_title = 'Students';
            $sub_title = 'Manage Students';

            return view('students.index', compact('students', 'main_title', 'sub_title'));
        }

        abort(403, 'This action is unauthorized.');
    }

    public function create()
    {
        $main_title = 'Students';
        $sub_title = 'Add Student';

        return view('students.add', compact('main_title', 'sub_title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students',
            'department' => 'required|string',
            'year' => 'required|integer',
            'batch' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:students', // Validate email
            'address' => 'required|string',
            'register_number' => 'required|string|unique:students',
        ]);

        // Debugging: Log the validated data
        \Log::info('Validated Data:', $validatedData);

        // Save the student record
        $student = Student::create($validatedData);

        // Debugging: Log the saved student
        \Log::info('Saved Student:', $student->toArray());

        return redirect()->route('students')->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id); // Fetch the student record
        $main_title = 'Students';
        $sub_title = 'Edit Student';

        return view('students.edit', compact('student', 'main_title', 'sub_title')); // Pass the correct variables
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id,' . $id,
            'department' => 'required|string',
            'year' => 'required|integer',
            'batch' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email,' . $id, // Validate email
            'address' => 'required|string',
            'register_number' => 'required|string|unique:students,register_number,' . $id,
        ]);

        $student->update($validatedData);

        return redirect()->route('students')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students')->with('success', 'Student deleted successfully.');
    }

    public function download($id)
    {
        $student = Student::findOrFail($id);

        // Ensure admin or owner can download
        if (auth()->user()->hasRole('admin') || $student->user_id == auth()->id()) {
            // Logic to download student data
            return response()->download(storage_path("app/public/students/{$student->file}"));
        }

        abort(403, 'Unauthorized action.');
    }
}

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = auth()->user()->hasRole('admin') ? Teacher::all() : Teacher::where('user_id', auth()->id())->get();
        $main_title = 'Teachers';
        $sub_title = 'Manage Teachers';

        return view('teachers.index', compact('teachers', 'main_title', 'sub_title'));
    }

    public function create()
    {
        $main_title = 'Teachers';
        $sub_title = 'Add Teacher';

        return view('teachers.add', compact('main_title', 'sub_title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|string|unique:teachers', // Ensure teacher_id is validated
            'department' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:teachers',
            'address' => 'required|string',
            'qualification' => 'required|string',
        ]);

        Teacher::create($validatedData); // Ensure teacher_id is passed here

        return redirect()->route('teachers')->with('success', 'Teacher added successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $main_title = 'Teachers';
        $sub_title = 'Edit Teacher';

        return view('teachers.edit', compact('teacher', 'main_title', 'sub_title'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|string|unique:teachers,teacher_id,' . $id,
            'department' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'address' => 'required|string',
            'qualification' => 'required|string',
        ]);

        $teacher->update($validatedData);

        return redirect()->route('teachers')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        Teacher::destroy($id);

        return redirect()->route('teachers')->with('success', 'Teacher deleted successfully.');
    }

    public function import(Request $request)
    {
        
        // $request->validate([
        //     'import_file' => 'required|mimes:csv,xlsx',
        // ]);
    
        try {
            $import = new TeachersImport;
            Excel::import($import, $request->file('import_file'));
    
            if ($import->failures()->isEmpty()) {
                flashMessage('danger', "Import Failed", "imported file must have at least one record.");
                return redirect()->route('teachers.create');
               
            } 
            elseif($import->failures()->isNotEmpty()) {
                $errorTable = '<table class="table table-bordered table-sm">';
                $errorTable .= '<thead><tr><th>Row</th><th>Field</th><th>Error</th><th>Value</th></tr></thead><tbody>';
    
                foreach ($import->failures() as $failure) {
                    $value = $failure->values()[$failure->attribute()] ?? 'N/A';
                    $errorTable .= '<tr>';
                    $errorTable .= '<td>' . $failure->row() . '</td>';
                    $errorTable .= '<td>' . $failure->attribute() . '</td>';
                    $errorTable .= '<td>' . implode(', ', $failure->errors()) . '</td>';
                    $errorTable .= '<td>' . $value . '</td>';
                    $errorTable .= '</tr>';
                }
    
                $errorTable .= '</tbody></table>';
    
                flashMessage('danger', "Import Failed", $errorTable);
                return redirect()->route('teachers.create');
            }
    
            flashMessage('success', "Success", "teachers have been imported successfully.");
        } catch (\Exception $e) {
            flashMessage('warning', "Error", "Failed to import teachers records: " . $e->getMessage());
            return redirect()->route('teachers.create');
        }
    
        return redirect()->route('teachers');
    }
    public function getTeacherData()
    {
        $teachers = Teacher::select(['id', 'name','qualification','teacher_id', 'department', 'mobile','email','address']);
        return DataTables::of($teachers)
            ->addColumn('actions', function ($teacher) {
                $editUrl = route('teachers.edit', $teacher->id);
                $deleteUrl = route('teachers.delete', $teacher->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
