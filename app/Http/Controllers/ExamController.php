<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Yajra\DataTables\Facades\DataTables; // Add this import

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $main_title = 'Exams';
        $sub_title = 'Manage Exams';

        return view('exams.index', compact('exams', 'main_title', 'sub_title'));
    }

    public function create()
    {
        $main_title = 'Exams';
        $sub_title = 'Add Exam';

        return view('exams.add', compact('main_title', 'sub_title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'date' => 'required|date',
            'day' => 'required|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'session' => 'required|string',
        ]);

        Exam::create($validatedData);

        return redirect()->route('exams')->with('success', 'Exam added successfully.');
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $main_title = 'Exams';
        $sub_title = 'Edit Exam';

        return view('exams.edit', compact('exam', 'main_title', 'sub_title'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'date' => 'required|date',
            'day' => 'required|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'session' => 'required|string',
        ]);

        $exam->update($validatedData);

        return redirect()->route('exams')->with('success', 'Exam updated successfully.');
    }

    public function destroy($id)
    {
        Exam::destroy($id);

        return redirect()->route('exams')->with('success', 'Exam deleted successfully.');
    }

    public function getExamData()
    {
        $exams = Exam::select(['id', 'exam_name', 'date', 'day', 'department', 'subject', 'session']);
        return DataTables::of($exams)
            ->addColumn('actions', function ($exam) {
                $editUrl = route('exams.edit', $exam->id);
                $deleteUrl = route('exams.delete', $exam->id);
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
