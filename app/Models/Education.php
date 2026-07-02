<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'employee_id',
        'certificate_name',
        'institute_name',
        'year_of_completion',
        'document_file',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}