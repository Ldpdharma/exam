<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSeating extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_name',
        'room_no',
        'floor',
        'block',
        'date',
        'time',
    ];
}
