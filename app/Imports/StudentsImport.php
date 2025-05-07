<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Carbon\Carbon;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Student::create([
                'name'            => $row['name'],
                'student_id'      => $row['student_id'],
                'department'      => $row['department'],
                'year'            => $row['year'],
                'batch'           => $row['batch'],
                'gender'          => $row['gender'],
                'dob'             => Carbon::createFromFormat('d-m-Y', $row['Date_of_birth'])->format('Y-m-d'), // Convert date
                'mobile'          => $row['mobile'],
                'email'           => $row['email'],
                'address'         => $row['address'],
                'register_number' => $row['register_number'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.name'            => 'required|string|max:255',
            '*.student_id'      => 'required|string|unique:students,student_id',
            '*.department'      => 'required|string',
            '*.year'            => 'required|integer',
            '*.batch'           => 'required|string',
            '*.gender'          => 'required|string',
            '*.dob'             => 'required|date',
            '*.mobile'          => 'required|max:15',
            '*.email'           => 'required|email|unique:students,email',
            '*.address'         => 'required|string',
            '*.register_number' => 'required|unique:students,register_number',
        ];
    }
}
