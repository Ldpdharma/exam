<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\Gate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;

class StudentExportController extends BaseController
{
    public function export(Request $request)
    {
        $department = $request->input('department', 'all');
        $year = $request->input('year', 'all');

        return ExcelFacade::download(new StudentsExport($department, $year), 'students.xlsx');
    }
}
