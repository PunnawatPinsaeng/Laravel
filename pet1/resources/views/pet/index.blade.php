@extends("layouts.master")
@section('title') ระบบสัตว์เลี้ยง | รายการสัตว์เลี้ยง @stop
@section('content')

<div class="container">

    <h1>รายการสัตว์เลี้ยง </h1>

    <div class="panel panel-default">
    
        <div class="panel-heading">

            <div class="panel-title"><strong>รายการ</strong></div>

        </div>

        <div class="panel-body">

            <!-- search form -->
            <form action="{{ URL::to('pet/search') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="ค้นหา. . .">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
                <a href="{{ URL::to('pet/edit') }}" class="btn btn-success pull-right">เพิ่มข้อมูลสัตว์เลี้ยง
                </a>
            </form>

        </div>

    </div>

    <table class="table table-bordered p_table">
        <thead>
            <tr>
            <th>รูปสัตว์เลี้ยง </th>
            <th>ชื่อสัตว์เลี้ยง </th>
            <th>ชนิดสัตว์เลี้ยง</th>
            <th>การทำงาน</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($pets as $p) 
            <tr> 
            <td><img src="{{ $p->image_url }}" width="50px"></td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->type->name }}</td>
            <td class="p_center">
                <a href="{{ URL::to('pet/edit/'.$p->id) }}" class="btn btn-info">
                <i class="fa fa-edit"></i> แก้ไข</a>
                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}">
                <i class="fa fa-trash"></i> ลบ</a>
            </td>
            
            </tr> @endforeach
        </tbody>
    </table>

    <div class="panel-footer">
        <span>แสดงข้อมูลจํานวน {{ count($pets) }} รายการ</span>
    </div>

</div>

<script>
    $('.btn-delete').on('click', function() { if(confirm("คุณต้องการลบข้อมูลสัตว์เลี้ยงหรือไม่?")) {
    var url = "{{ URL::to('pet/remove') }}"
    + '/' + $(this).attr('id-delete'); window.location.href = url;
    }});
</script>

@endsection