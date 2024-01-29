@extends('layouts.theme1.admin')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack form-label">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3"
                         style="width: 100%;text-align: center">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Add New Leave Type</h1>
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid ">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl ">

                    <form class="form d-flex flex-column flex-lg-row" action="{{route('admin.hr.leavesTypes.store')}}" method="POST">
                       @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class=" card-flush py-4">


                                <div class="card card-flush py-4">
                                    <div class="card-body pt-0 ">
                                        <div class=" fv-row row">
                                            <div class="col-sm-12">
                                                <label class="required form-label">Type Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control" required name="name">
                                            </div>

                                            <div class="col-sm-12">
                                                <label class="required form-label">Employee Category</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-control"
                                                        name="employee_category"
                                                        required>
                                                    <option value="all">For All Employees</option>
                                                    @foreach($employees as $emp)
                                                        <option
                                                            value="{{$emp->designation}}">{{$emp->designation}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-sm-12">
                                                <label class="required form-label">Joining Date in days</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" class="form-control" required name="joining_days">
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="required form-label">Quantity</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" class="form-control" required name="quantity">
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="required form-label">Status</label>

                                                <select class="form-control" required name="status">
                                                    <option value="active">Active</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <label class=" form-label"></label>

                                                <button class="form-control btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                </div>


                            </div>
                        </div>
                        <!--end::Main column-->
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2023&copy;</span>
                    <a href="https://keenthemes.com" target="_blank"
                       class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
    <script>
        function calculateDateDifference() {
            // Get the values of the datetime inputs
            var startDateValue = document.getElementById("startDate").value;
            var endDateValue = document.getElementById("endDate").value;

            // Convert the input values to Date objects
            var startDate = new Date(startDateValue);
            var endDate = new Date(endDateValue);

            // Calculate the difference in milliseconds
            var timeDifference = endDate - startDate;

            // Convert milliseconds to days
            var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

            // Display the result in the label
            var resultLabel = document.getElementById("diffBetweenDates");
            console.log(daysDifference);
            //resultLabel.value = "Total days difference: " + daysDifference + " days";
            resultLabel.textContent = daysDifference + " days";
        }

        var divCount = 1;

        // Function to clone the original div with a new id
        function cloneDiv() {
            var originalDiv = $('#originalDiv');
            var newDiv = originalDiv.clone();
            var newId = 'clonedDiv' + divCount;
            newDiv.attr('name', 'ApproveContainer' + divCount + '[]');
            newDiv.attr('id', newId);

            //newDiv.text('Cloned Div ' + divCount);

            $('#ApproveContainer').append(newDiv);
            divCount++;
        }


    </script>
    <script>
    </script>
@endsection

