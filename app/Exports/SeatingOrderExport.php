<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SeatingOrderExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $students;

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function collection()
    {
        return $this->students;
    }

    public function headings(): array
    {
        return [
            'Serial Number',
            'Student Name',
            'Register Number',
            'Department',
            'Year',
            'Room Number',
            'Seat Number',
            'Bench Number'
        ];
    }
}
