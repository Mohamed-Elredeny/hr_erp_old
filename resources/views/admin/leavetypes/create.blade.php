@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <!--begin::Content container-->
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
    <form class="form d-flex flex-column flex-lg-row" action="{{route('admin.leavesTypes.store')}}" method="POST">
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
                                <label class="required form-label">Quantity</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control" required name="quantity">
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

