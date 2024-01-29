<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Collapse</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap CSS and JS (assuming you are using Bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<button class="col-sm-12 text-center btn btn-light mt-2" type="button"
        data-toggle="collapse"
        data-target="#collapseExample"
        style="font-weight: bolder">Available Leaves 1
</button>

<div class="collapse" id="collapseExample">
    <!-- Your collapsible content goes here -->
    <div class="">
        <!-- Content of the collapsed element -->
        Your collapsible content goes here.
    </div>
</div>

<button class="col-sm-12 text-center btn btn-light mt-2" type="button"
        data-toggle="collapse"
        data-target="#collapseExample2"
        style="font-weight: bolder">Available Leaves 2
</button>

<div class="collapse" id="collapseExample2">
    <!-- Your collapsible content goes here -->
    <div class="card card-body">
        <!-- Content of the collapsed element -->
        Your collapsible content goes here.
    </div>
</div>

<!-- Add more buttons and collapses as needed -->

<script>
    // jQuery code to toggle the collapse state
    $(document).ready(function () {
        // Add a click event listener to the button
        $(".btn-light").click(function () {
            // Get the target collapse
            var targetCollapse = $($(this).data("target"));

            // Toggle the collapse state of the target
            targetCollapse.collapse("toggle");
        });
    });
</script>

</body>
</html>
