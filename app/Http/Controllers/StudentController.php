<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

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
            'roll_number' => 'required|string|unique:students',
        ]);

        // Debugging: Log the validated data
      //  \Log::info('Validated Data:', $validatedData);

        // Save the student record
        $student = Student::create($validatedData);

        // Debugging: Log the saved student
      //  \Log::info('Saved Student:', $student->toArray());

        if ($student) {
            flashMessage('success', "Success", "Student details have been added successfully.");
        } else {
            flashMessage('danger', "Error", "Failed to add student details.");
        }

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
            'roll_number' => 'required|string|unique:students,roll_number,' . $id,
        ]);

        $validatedData['dob'] = $request->dob;

        if ($student->update($validatedData)) {
            flashMessage('success', "Success", "Student details have been updated successfully.");
        } else {
            flashMessage('danger', "Error", "Failed to update student details.");
        }

        return redirect()->route('students')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        if (Student::destroy($id)) {
            flashMessage('success', "Success", "Student has been deleted successfully.");
        } else {
            flashMessage('danger', "Error", "Failed to delete student.");
        }

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



public function import(Request $request)
{
    // $request->validate([
    //     'import_file' => 'required|mimes:csv,xlsx',
    // ]);

    try {
        $import = new StudentsImport;
        Excel::import($import, $request->file('import_file'));

        if ($import->failures()->isEmpty()) {
            flashMessage('danger', "Import Failed", "imported file must have at least one record.");
            return redirect()->route('students.create');
           
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
            return redirect()->route('students.create');
        }

        flashMessage('success', "Success", "Students have been imported successfully.");
    } catch (\Exception $e) {
        flashMessage('warning', "Error", "Failed to import student records: " . $e->getMessage());
        return redirect()->route('students.create');
    }

    return redirect()->route('students');
}


    public function getStudentData()
    {
        $students = Student::select(['id', 'name', 'student_id', 'department', 'year', 'batch', 'mobile','email','register_number','roll_number']);
        return datatables()->of($students)
            ->addColumn('actions', function ($student) {
                $editUrl = route('students.edit', $student->id);
                $deleteUrl = route('students.delete', $student->id);
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
