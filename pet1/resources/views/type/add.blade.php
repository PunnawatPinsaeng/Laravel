
@extends("layouts.master") @section('title') ระบบสัตว์เลี้ยง | เพิ่มข้อมูลชนิดสัตว์เลี้ยง @stop
@section('content')

{!! Form::open(array('action' => 'App\Http\Controllers\TypeController@insert',
'method'=>'post', 'enctype' => 'multipart/form-data')) !!}

<h1>เพิ่มข้อมูลชนิดสัตว์เลี้ยง </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('type') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มข้อมูลชนิดสัตว์เลี้ยง </li>
</ul>

@if($errors->any())
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
</div>
@endif

<div class="panel panel-default">

        <div class="panel-heading">

            <div class="panel-title">

                <strong>ข้อมูลสัตว์เลี้ยง </strong>

            </div>
        </div>

    <div class="panel-body">

        <table>


            <tr>
                <td>{{ Form::label('name', 'ชื่อชนิดสัตว์เลี้ยง') }} </td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>

        </table>

    </div>

        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> บันทึก</button>
        </div>

</div>

{!! Form::close() !!}

@endsection
