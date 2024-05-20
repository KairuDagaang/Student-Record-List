<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'id_number' => $row[0],
            'name' => $row[1],
            'course' => $row[2],
            'year' => $row[3],
            'subject' => $row[4],
        ]);
    }
}
