<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport; 

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('id')->get();

        return inertia('Students/Record', [
            'students' => $students
        ]);
    }
    
    public function scan() {
        return view('scanner');
    }

    function generateCSV(){
        $students = Student::orderBy('id')->get();

        $filename = '../storage/studentrecords.csv';

        $file = fopen($filename, 'w+');

        foreach($students as $sr){
            fputcsv($file, [
                $sr->id_number,
                $sr->name,
                $sr->course,
                $sr->year,
                $sr->subject
            ]);
        }
        fclose($file);
        return response()->download($filename);
    }

    public function create() {
        return inertia('Students/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_number' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year' => 'required',
            'subject' => 'required'

        ]);
        Student::create($request->all());

        return redirect('/Record');
    }

    public function pdf() {
        $students = Student::orderBy('name')->get();
        foreach ($students as $stud) {
            $stud->qrCode = QrCode::size(100)->generate($stud->id);
        }
        $pdf = Pdf ::loadView('student-list', compact('students'));
    
        return $pdf->download('student-list.pdf');
    }

    public function csvroute() {
        return view('student-csvimport');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv-file' => 'required|file|mimes:csv,txt',
        ]);
    
        $file = $request->file('csv-file');
        Excel::import(new StudentsImport, $file);
    
        return redirect()->route('student-csvimport')->with('success', 'CSV Imported Successfully, Return to the Students List');
    }
}
