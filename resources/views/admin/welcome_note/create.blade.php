@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>Add Welcome Note Employee</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{route('admin.welcome.create.store')}}" method="POST" class="" id="myForm"  enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3" id="">
                            <b>Employees: </b>
                            <input list="all_employees" required name="all_employees" id="all_employees_toty" onchange="selectEmployee()">
                            <datalist id="all_employees">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->empName }}">
                                @endforeach
                            </datalist>
                        </div>

                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                            <tr>
                                <td class="font-weight-bold">Emp #</td>
                                <td id="emp_code"></td>
                                <td class="font-weight-bold">Date of Joining</td>
                                <td id="joiningDate"></td>
                                <td class="font-weight-bold">Project Number</td>
                                <td id="projectDepartmentNumber"></td>
                            </tr>
                            <tr>
                                <td style="width: 13.5%;" class="font-weight-bold" >Employee Name:</td>
                                <td style="width: 13%;" id="empName"></td>
                                <td style="width: 14%;" class="font-weight-bold">Position / Title:</td>
                                <td style="width: 14.28%;" id="designation"></td>
                                <td class="font-weight-bold">Department/Project:</td>
                                <td id="projectDepartmentName"></td>
                            </tr>
                        </table>

                        <div class="row m-5">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary" style="width: 200px !important;">
                                    Add Employee
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')
<script>
    // function selectEmployee(){
    //     var emp = document.getElementById('all_employees_toty').value;
    //     document.getElementById('emp_code').textContent = emp;
    //     console.log(emp);
    // }
    function selectEmployee() {
        // Get the selected employee name
        var selectedEmployee = document.getElementById('all_employees_toty').value;

        // Assuming you have an endpoint to fetch employee data by name, you can use fetch API
        fetch('/admin/get/employee/' + selectedEmployee)
            .then(response => response.json())
            .then(data => {
                // Update the table with the fetched data
                document.getElementById('empName').innerText = data.empName;
                document.getElementById('emp_code').innerText = data.empCode;
                document.getElementById('joiningDate').innerText = data.joiningDate;
                document.getElementById('designation').innerText = data.designation;
                document.getElementById('projectDepartmentNumber').innerText = data.projectDepartmentNumber;
                document.getElementById('projectDepartmentName').innerText = data.projectDepartmentName;
                // Update other fields as needed

                // You may also want to reset other fields if the employee changes
                // For example, clear the values in case there was a previous selection
                // document.getElementById('designation').innerText = '';
                // document.getElementById('projectDepartmentName').innerText = '';
                // ...

            })
            .catch(error => {
                console.error('Error fetching employee data:', error);
            });
    }
</script>
@endsection
