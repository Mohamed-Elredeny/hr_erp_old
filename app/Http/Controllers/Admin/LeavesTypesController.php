<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use function redirect;
use function view;

class LeavesTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = LeaveType::get();
        return view('admin.leavetypes.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees  = Employee::get();
        return view('admin.leavetypes.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        LeaveType::create([
            'name'=>$request->name,
            'employee_category'=>$request->employee_category ?? 'all',
            'joining_days'=>$request->joining_days ?? 0,
            'quantity'=>$request->quantity,
            'available_after'=>$request->available_after ?? 0,
            'status'=>$request->status ?? 'active'
        ]);
        return redirect()->back()->with('success', "Done Successfully ");
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
        $leave_type = LeaveType::find($id);
        return view('admin.leavetypes.edit',compact('leave_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leave_type = LeaveType::find($id);
        $leave_type->update([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
        ]);
        return redirect()->back()->with('success', 'Done Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leaves = Leave::where('leave_type_id',$id)->count();
        if($leaves > 0){
            return redirect()->back()->with('error', 'you can not delete this leave it is already in use');

        }else {
            LeaveType::destroy($id);
            return redirect()->back()->with('success', 'Done Successfully ');
        }
    }
}
