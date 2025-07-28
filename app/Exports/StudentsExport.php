<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    protected $department;
    protected $year;

    public function __construct($department = null, $year = null)
    {
        $this->department = $department;
        $this->year = $year;
    }

    public function collection()
    {
        $query = Student::query();
        
        if ($this->department !== null && $this->department !== 'all') {
            $query->where('department', $this->department);
        }
        
        if ($this->year !== null && $this->year !== 'all') {
            $query->where('year', $this->year);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Registration Number',
            'Department',
            'Year'
        ];
    }
}
