
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "ระบบสัตว์เลี้ยง | ข้อมูลสัตว์เลี้ยงต่างๆ")</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
</head>
<body>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
        
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Pet</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <li><a href="#">หน้าแรก</a></li>
                <li><a href="{{ URL::to('pet') }}">ข้อมูลสัตว์เลี้ยง </a></li>
                <li><a href="{{ URL::to('type') }}">ชนิดสัตว์เลี้ยง </a></li>
                <li><a href="#">รายงาน</a></li>
                </ul>
            </div>
        
        </nav>

        <div class="table table-bordered p_table" style="text-align: center">

            <h4> ชื่อ นาย ปัณณวรรธ ปิ่นแสง รหัสนักศึกษา 6406021620050 </h4>

        </div>

        @yield("content")

        @if(session('msg'))
        @if(session('ok'))
            <script>toastr.success("{{ session('msg') }}")</script>
        @else
            <script>toastr.error("{{ session('msg') }}")</script>
        @endif
        @endif

    </div>

</body>
</html>

{{-- <script>
    toastr.success("บันทึกข้อมูลสําเร็จ");
    toastr.error("ไม่สามารถบันทึกข้อมูลได้" );
</script> --}}