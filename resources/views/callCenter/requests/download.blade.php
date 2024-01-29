<html lang="ar">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>
<body>
<div class="text-center" style=" text-align: center">
    <div style="display: flex; align-items: center;">
        <div style="flex: auto; height: 100px; width: 450px">
            <img src="{{asset("assets/admin/images/icons/management.png")}}" style="height: 100px; width: 450px">
        </div>
    </div>
    <br>
    <br>
    <div style="text-align: center; display: flex; align-items: center; direction: rtl">
        <table style="word-wrap: normal; direction: rtl; border: solid 1px #000000; text-align: right; width: fit-content; margin: 0 70px; font-size:30px" class="table table-bordered mt-3">
            <tr>
                <td>الاسم</td>
                <td>{{$pending->name}}</td>
            </tr>
            <tr>
                <td>الحي</td>
                <td>{{$pending->centerAreaname->name}}</td>
            </tr>
            <tr>
                <td>المركز</td>
                <td>
                                                                    {{$pending->centerAreaname->center->name}}
                                                                </td>
            </tr>
            <tr>
                <td>اليوم</td>
                <td>{{$pending->day}}</td>
            </tr>
            <tr>
                <td>التاريخ</td>
                <td>{{$pending->date}}</td>
            </tr>
            <tr>
                <td>الوقت</td>
                <td>{{$pending->time}}</td>
            </tr>
        </table>
        <img src="{{asset("uploads/$pending->qr")}}"  style="height: 150px; width: 150px">
    </div>


</div>
</body>
<script>

    html2canvas(document.body, {
        onrendered: function(canvas) {
            getCanvas = canvas;
            var imgageData = getCanvas.toDataURL("image/png");
            var a = document.createElement("a");
            a.href = imgageData; //Image Base64 Goes here
            a.download = "Image.png"; //File name Here
            a.click(); //Downloaded file
        }
    });
</script>
</html>
