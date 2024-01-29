<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description"
          content="AppCo App Landing Page Template. agency landing page template helps you easily create websites for your business, marketing landing page template form promotion and many more.">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content=""/> <!-- website name -->
    <meta property="og:site" content=""/> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content=""/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <!--title-->
    <title>AppCo App Landing Page Template</title>

    <!--favicon icon-->
    <link rel="icon" href="{{asset("assets/site/img/favicon.png")}}" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&display=swap"
          rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/bootstrap.min.css")}}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/magnific-popup.css")}}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/themify-icons.css")}}">
    <!--animated css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/animate.min.css")}}">

    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/site/css/owl.theme.default.min.css")}}">
    <!--custom css-->
    <link rel="stylesheet" href="{{asset("assets/site/css/style.css")}}">
    <!--responsive css-->

    <link rel="stylesheet" href="{{asset("assets/site/css/responsive.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
             integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

    <style>

        .top-header {
            display: flex;
            flex-direction: row;
            align-items: center;
            position: absolute;
            top: 0;
            left: 260px;
            right: 0;
            height: 65px;
            padding: 0 1.5rem;
            z-index: 5;
            transition: 0.3s all;
        }

        .top-header .navbar {
            width: 100%;
        }

        .top-header .mobile-menu-button {
            color: #293445;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            display: none;
        }

        .top-header .mobile-search-button {
            display: none;
        }


        .top-header .navbar .searchbar {
            position: relative;
            width: 28%;
        }

        .top-header .navbar .searchbar .form-control {
            box-shadow: none;
            padding-left: 2.5rem;
            padding-right: 2.5rem;
            border: 1px solid #e9ecef;
            background-color: #ffffff;
        }

        .top-header .navbar .searchbar .form-control:focus {
            background-color: #fff;
            border-color: #c27be4;
            box-shadow: 0 0 0 .25rem rgba(146, 62, 185, 0.3)

        }

        .top-header .navbar .top-navbar-right .nav-link {
            color: #293445;
            font-size: 18px;
            font-weight: 500;
            padding-right: .7rem;
            padding-left: .7rem;
        }

        .top-header .navbar .searchbar .search-icon {

            color: #41464b;
            font-size: 1.2rem;
            opacity: 0.5;
            font-size: 20px;

        }

        .top-header .navbar .searchbar .search-close-icon {
            right: 2rem;
            opacity: 0.5;
            cursor: pointer;
            display: none;
            font-size: 20px;
        }

        .top-header .navbar .user-img {
            width: 30px;
            height: 30px;
            padding: 0px;
            border-radius: 50%;
        }

        .dropdown-toggle-nocaret:after {
            display: none
        }

        .top-header .navbar .nav-link .notify-badge {
            position: absolute;
            top: 0px;
            right: -8px;
            color: #fff;
            font-size: 12px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f50d0d;
            z-index: 1;
        }

        .dropdown-user-setting .dropdown-menu {
            color: #1e2125;
            width: 230px;
            font-size: 14px;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)
        }

        .top-header .navbar .dropdown-user-setting .dropdown-menu::after {
            content: '';
            width: 13px;
            height: 13px;
            background: #fff;
            position: absolute;
            top: -6px;
            right: 16px;
            transform: rotate(45deg);
            border-top: 1px solid #ddd;
            border-left: 1px solid #ddd
        }

        .top-header .navbar .dropdown-menu::after {
            content: '';
            width: 13px;
            height: 13px;
            background: #ffff;
            position: absolute;
            top: -6px;
            right: 16px;
            transform: rotate(45deg);
            border-top: 1px solid #ddd;
            border-left: 1px solid #ddd
        }

        .top-header .navbar .dropdown-item:hover,
        .top-header .navbar .dropdown-item:focus {
            color: #1e2125;
            background-color: #f5f5f5
        }


        .top-header .navbar .dropdown-menu {
            -webkit-animation: .6s cubic-bezier(.25, .8, .25, 1) 0s normal forwards 1 animdropdown;
            animation: .6s cubic-bezier(.25, .8, .25, 1) 0s normal forwards 1 animdropdown
        }

        @-webkit-keyframes animdropdown {
            from {
                -webkit-transform: translate3d(0, 6px, 0);
                transform: translate3d(0, 6px, 0);
                opacity: 0
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }

        @keyframes animdropdown {
            from {
                -webkit-transform: translate3d(0, 6px, 0);
                transform: translate3d(0, 6px, 0);
                opacity: 0
            }
            to {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }


        .dropdown-large {
            position: relative
        }

        .dropdown-large .dropdown-menu {
            width: 320px;
            border: 1px solid #e9ecef;
            padding: 0 0;
            border-radius: 10px;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)
        }

        .top-header .navbar .dropdown-large .dropdown-menu::after {
            content: '';
            width: 13px;
            height: 13px;
            background: #fff;
            position: absolute;
            top: -6px;
            right: 16px;
            transform: rotate(45deg);
            border-top: 1px solid #ddd;
            border-left: 1px solid #ddd
        }


        .top-header .navbar .dropdown-apps .dropdown-menu::after {
            content: '';
            width: 13px;
            height: 13px;
            background: #343a40;
            position: absolute;
            top: -6px;
            right: 12px;
            transform: rotate(45deg);
            border-top: 1px solid #ddd;
            border-left: 1px solid #ddd
        }


        .dropdown-large .msg-header {
            padding: .8rem 1rem;
            border-bottom: 1px solid #ededed;
            background-clip: border-box;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .dropdown-large .msg-header .msg-header-title {
            font-size: 15px;
            color: #1c1b1b;
            margin-bottom: 0;
            font-weight: 500
        }

        .dropdown-large .msg-header .msg-header-clear {
            font-size: 12px;
            color: #585858;
            margin-bottom: 0
        }

        .dropdown-large .msg-footer {
            padding: .8rem 1rem;
            color: #1c1b1b;
            border-top: 1px solid #ededed;
            background-clip: border-box;
            background: 0 0;
            font-size: 14px;
            font-weight: 500;
        }

        .dropdown-large .user-online {
            position: relative
        }

        .dropdown-large .msg-name {
            font-size: 13px;
            margin-bottom: 0
        }

        .dropdown-large .msg-info {
            font-size: 12px;
            margin-bottom: 0
        }

        .dropdown-large .msg-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 15px
        }

        .dropdown-large .msg-time {
            font-size: 11px;
            margin-bottom: 0;
            color: #919191
        }

        .dropdown-large .user-online:after {
            content: '';
            position: absolute;
            bottom: 1px;
            right: 17px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            box-shadow: 0 0 0 2px #fff;
            background: #16e15e
        }


        .dropdown-large .dropdown-menu .dropdown-item {
            padding: .5rem 1.3rem;
            border-bottom: 1px solid #ededed
        }


        .header-message-list {
            position: relative;
            height: 360px
        }

        .header-notifications-list {
            position: relative;
            height: 360px
        }

        .dropdown-large .notify {
            font-size: 26px;
            text-align: center;
            margin-right: 15px
        }

        .app-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            font-size: 24px;
            justify-content: center;
            cursor: pointer;
            border-radius: 50%;
            background-color: #f6f6f6;
            margin-bottom: 5px;
        }

        .app-title {
            color: #fff;
            font-size: 14px;
        }

        .header-notifications-list {
            position: relative;
            height: 332px;
        }


        .breadcrumb-title {
            font-size: 20px;
            border-right: 1.5px solid #ced3da;

        }

        .page-breadcrumb .breadcrumb li.breadcrumb-item {
            font-size: 16px;

        }

        .page-breadcrumb .breadcrumb li a {
            font-size: 20px;
            color: #697278;
        }

        .page-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
            display: inline-block;
            padding-right: .5rem;
            font-family: LineIcons;
            content: "\ea5c";
        }


    </style>
    <style>
        .dropdown-menu {
            right: 0 !important;
        }

        .image-containerr {
            position: relative;
            display: inline-block;
        }

        .edit-icon {
            font-size: x-large;
            position: absolute;
            bottom: -25px;
            right: 20px;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    @yield('style')
</head>
<body>
<?php
use Illuminate\Support\Facades\Route;

$currentRouteName = Route::currentRouteName();
?>
<div class="container  p-5 text-left" style="font-weight: bolder">
    <div class="row">
        <div class="col-sm-12 text-center h5">
            Policy and Procedure
            Travel and Leave
        </div>
    </div>
    <div>
        <br>

        <u><b>Eligibility of Ticket</b></u><br>

        Employees under staff category are entitled for a return Air ticket on completion of 365 working days
        which includes 30 calendar days’ leave.
        <br><br>
        <u><b>Fixing of Permanent Destination</b></u><br>

        The place of destination will be determined by HR department based on passport address and joining form
        filled by employee and can only be changed upon form submission to HR advising a valid reason for the
        change.
        <br><br>
        <u><b>Temporary change of Destination</b></u><br>
        If the ticket is arranged by the company and the employee want to change the timing or reroute for
        personal reasons, this should be done through HR department and the difference in cost will be borne by
        the employee.
        <br><br>
        If the ticket is changed while employee on leave as per his/her request, the incurred difference will be
        charged to his/her personal once he rejoin from leave
        <br><br>

        <u><b> Ticket issuing Procedure.</b></u><br>

        Upon receipt of the approved leave application in compliance to the company policy, the Employee
        relation staff should book the ticket thru Amadeus to purchase thru company approved.
        <br><br>

        <u><b> Business Travel.</b></u><br>
        For business travel, prior approval from GM on leave request is required prior to proceeding with
        issuing any ticket.
        <br><br>
        <u><b> Business Leave</b></u><br>
        Granted for employees to go for meetings / visits which is related to work.
        <br><br>

        <u><b> Annual Leave</b></u><br>

        1. Staff who have completed 12 months of continuous service are entitled for paid annual leave on
        completion of their first year of service. Thereafter employees who have returned from leave and
        completed 11 months (335/336 days) of subsequent continuous service will be entitled to 30 days leave
        for subsequent periods of service.
        <br>
        2. Employees should require to attend the work on the day of leave departure and leave resumption.
        <br><br>
        <u><b> Unpaid Leave</b></u><br>
        <ul>
            <li>
                1. Leave requested by employee in time of non — entitlement of annual leave and granted only subject to
                his
                manager’s approval
            </li>
            <li>
                2. Need to submit relevant/supporting documents for availing unpaid leave during 1st year with company.
            </li>
            <li>
                3. Employees should require to attend the work on the day of leave departure and leave resumption.
            </li>
        </ul>

        <br><br>
        <u><b> Casual leave</b></u><br>

        1. Granted for employees upon request and is limited to maximum 3 days per working year subject that the
        leave if to be used while in Qatar.
        <br><br>
        2. 3 days’ casual leave granted in a year should not be availed continuously for 3 days.
        Casual leave will be eligible only upon completion of their first year of service.
        <br><br>
        <u><b> Sick leave</b></u><br>

        1. It’s leave granted from selected hospital that grant employee leave while sick and this is reimbursed on
        the basis of 14 days’ full salary and 28 days half salary and afterward its considered as unpaid unless
        its work related injury.
        <br>
        2. No Sick leave during probation period and any sick leave needs to be validated with a medical
        certificate from a local doctor certified in Qatar.
        <br>
        3. The approved sick leave days issued from Qatar certified doctors or hospital as per above can spend in
        home country if the leave is above 7 days and also subject to duly filled Leave request form with
        relevant approvals.
        <br><br>

        <u><b> Maternity leave</b></u><br>

        Granted upon delivery and for employees who completed more than a year with the company and is limited
        to 50 days.
        <br><br>
        <u><b> Compassionate leave</b></u><br>

        1. The purpose of this policy is to clarify the extent of support ENSRV Group provide to staff in case of
        sudden demise of one of their immediate relatives.
        <br>
        2. Immediate Relatives: includes Father, Mother, Spouse, Son or Daughter.
        This policy applies only to all employees under staff payroll who completed one year of service with the
        company.
        <br>
        3. 5 days paid leave and a round trip ticket shall be provided to staff travelling due to the demise of an
        immediate relative (a leave request should be submitted for that reason and leave type shall be
        compassionate leave).
        <br>
        4. If compassionate leave exceeds 10 days, employee will not be eligible for 5 days paid leave and
        compassionate Ticket.
        <br>
        5. This policy will not be applicable in case of any staff has resigned or while serving a notice period.
        <br>
        6. If an employee went on unpaid leave due to known reason of disease of his immediate relatives and the
        death happened within a period of 10 days of his travel from Doha, the ticket he purchased can be
        reimbursed. This ticket will set off against the forthcoming ticket due date.
        <br>
        7. If the death happens during leave, no days’ reimbursement can be claimed by employee in such case.
        <br>
        8. Upon rejoining from compassionate leave, a death certificate issued from the relevant authorized
        department in home country shall be submitted for HR records within a period of one month.
        <br><br>
        <u><b> Deviation from the leave</b></u><br>

        Any deviation from the above policy will be subject to approval by Group HR Director
        <br>
        The policy can be updated or modified as per HR policy requirements.
    </div>
</div>

@yield('footer')
<!--jQuery-->
<script src="{{asset("assets/site/js/jquery-3.5.0.min.js")}}"></script>
<!--Popper js-->
<script src="{{asset("assets/site/js/popper.min.js")}}"></script>
<!--Bootstrap js-->
<script src="{{asset("assets/site/js/bootstrap.min.js")}}"></script>
<!--Magnific popup js-->
<script src="{{asset("assets/site/js/jquery.magnific-popup.min.js")}}"></script>
<!--jquery easing js-->
<script src="{{asset("assets/site/js/jquery.easing.min.js")}}"></script>

<!--wow js-->
<script src="{{asset("assets/site/js/wow.min.js")}}"></script>
<!--owl carousel js-->
<script src="{{asset("assets/site/js/owl.carousel.min.js")}}"></script>
<!--countdown js-->
<script src="{{asset("assets/site/js/jquery.countdown.min.js")}}"></script>
<!--validator js-->
<script src="{{asset("assets/site/js/validator.min.js")}}"></script>
<!--custom js-->
<script src="{{asset("assets/site/js/scripts.js")}}"></script>
{{--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>


--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@yield('script')
<script>
    var textContainer = document.getElementById("textContainer");

    // Get the content of the text container
    var fullText = textContainer.innerText;

    // Split the text into words
    var words = fullText.split(' ');

    // Take the first two words
    var firstTwoWords = words.slice(0, 2).join(' ');

    // Replace the content of the text container with the first two words
    textContainer.innerText = firstTwoWords;
</script>
<script>
    $(document).ready(function () {
        $('.exampleSelect').select2();
    });
    $(document).ready(function () {
        $('.filterInput').on('input', function () {
            var filterValue = $(this).val().toLowerCase();
            $('.filter_row').each(function () {
                var rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(filterValue));
            });
        });
    });
    /* $(document).on('click',function(){
         $('.collapse').collapse('hide');
     })*/

</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>


<!-- Main JS-->
<script src="{{asset('assets/admin/en/js/main.js')}}"></script>

<script src="{{asset('assets/admin/en/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>

