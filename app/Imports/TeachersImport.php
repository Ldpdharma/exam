<?php

namespace App\Imports;

use App\Models\Teacher;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class TeachersImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Teacher::create([
                'name'         => $row['Name'],
                'teacher_id'   => $row['Teacher_ID'],
                'department'   => $row['Department'],
                'gender'   => $row['Gender'],
                'dob'   => $row['Date_of_birth'],
                'mobile'   => $row['Mobile'],
                'email'   => $row['Email'],
                'address'   => $row['Address'],
                'qualification'   => $row['Qualification'],
            ]);
        }
    }
    public function rules(): array
    {
        return [
            '*.name'            => 'required|string|max:255',
            '*.teacher_id'      => 'required|string|unique:teachers,student_id',
            '*.department'      => 'required|string',
            '*.gender'          => 'required|string',
            '*.dob'             => 'required|date',
            '*.mobile'          => 'required|max:15',
            '*.email'           => 'required|email|unique:teachers,email',
            '*.address'         => 'required|string',
            '*.qualification' => 'required|string',
        ];
    }
    }