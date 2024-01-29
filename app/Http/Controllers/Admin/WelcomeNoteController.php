<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\WelcomeNoteEmployee;
use Illuminate\Http\Request;

class WelcomeNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    function index()
    {
        $employees = WelcomeNoteEmployee::get();
        return view('admin.welcome_note.index', compact('employees'));
    }

    function create()
    {
        $welcomeEmployees = WelcomeNoteEmployee::get();
        $employees = Employee::get();
//        dd($employees);
        return view('admin.welcome_note.create', compact('employees', 'welcomeEmployees'));
    }

    function store(Request $request)
    {
        $employee = Employee::where('empName', $request->all_employees)->first();

        WelcomeNoteEmployee::create([
            'emp_id' => $employee->id,
        ]);

        return redirect()->back()->with('success', 'Done Successfully');
    }

    function getEmployee($name)
    {
        $employee = Employee::where('empName', $name)->first();

        if ($employee) {
            // You can customize the response structure based on your needs
            return response()->json([
                'empName' => $employee->empName,
                'empCode' => $employee->empCode,
                'joiningDate' => $employee->joiningDate,
                'designation' => $employee->designation,
                'projectDepartmentNumber' => $employee->projectDepartmentNumber,
                'projectDepartmentName' => $employee->projectDepartmentName,
                'company_id' => $employee->company_id,
                // Add other fields as needed
            ]);
        } else {
            // Handle the case where the employee is not found
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }
}
