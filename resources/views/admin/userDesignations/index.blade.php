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
            <h3>الوظائف المتاحة</h3>
            <a href="{{route('admin.userDesignations.create')}}" type="button" class="btn btn-primary px-4">
                {{ "اضافة نوع جديد" }}
            </a>
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
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered align-middle text-center" style="width:100%">
                            <thead>
                            <tr class="text-center text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Category</th>
                                <th class="min-w-125px">Joining Days</th>
                                <th class="min-w-125px">Quantity</th>
                                <th class="min-w-125px">Status</th>
                                <th class="min-w-125px">Created Date</th>
                                <th class="min-w-70px">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($results as $res)
                                <tr>

                                    <td>
                                        {{$res->name}}
                                    </td>
                                    <td>
                                        {{$res->employee_category}}
                                    </td>
                                    <td>
                                        {{$res->joining_days}}

                                    </td>
                                    <td>
                                        {{$res->quantity}}

                                    </td>
                                    <td>
                                        <!--begin::Badges-->
                                        <div
                                            class="badge @if($res->status == 'active') badge-light-success @else badge-light-danger @endif"> {{$res->status}}</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td>      {{$res->created_at}}</td>
                                    <td class="text-center">

                                        <!--begin::Menu item-->
                                        <a href="{{route('admin.leavesTypes.edit',['leavesType'=>$res->id])}}"
                                           class="btn btn-warning text-white" style="display:inline-block">Edit</a>

                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <form class="menu-item px-3" method="post" style="display:inline-block"
                                              action="{{route('admin.leavesTypes.destroy',['leavesType'=>$res->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>

                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    },
                ],

            });
        });
    </script>
@endsection

