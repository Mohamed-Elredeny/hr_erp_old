<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DesignaionsImport;
use App\Imports\EditEmployeeImport;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\UserDesignation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserDesignationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Designation::get();
        return view('admin.userDesignations.index', compact('results'));
    }

    public function designationsImportExcel(Request $request)
    {
        $fileName = $request->excel_file->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName;
        $request->excel_file->move(public_path('assets/images/files/'), $file_to_store);
        $sheetNames = (new \PhpOffice\PhpSpreadsheet\Reader\Xlsx())->listWorksheetNames(public_path("assets/images/files/$file_to_store"));

        foreach ($sheetNames as $sheetName) {
            // Import data from the sheet
            $data = Excel::toArray(new DesignaionsImport, public_path("assets/images/files/$file_to_store"), null, $sheetName);
            // Process the data as needed
            dd($data);
            foreach ($data[0] as $row) {
                // Process each row of data
                // You can perform your operations here
                // $row is an array representing a row in the Excel sheet
            }
        }

        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::get();
        return view('admin.userDesignations.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
