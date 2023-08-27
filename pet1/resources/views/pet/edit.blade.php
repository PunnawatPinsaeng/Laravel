
@extends("layouts.master") @section('title') ระบบสัตว์เลี้ยง | แก้ไขข้อมูลสัตว์เลี้ยง @stop
@section('content')

{!! Form::model($pet, array('action' => 'App\Http\Controllers\PetController@update' , 'method' => 'post', 'enctype' => 'multipart/form-data')) !!}

<h1>แก้ไขข้อมูลสัตว์เลี้ยง </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('pet') }}">หน้าแรก</a></li>
    <li class="active">แก้ไขข้อมูลสัตว์เลี้ยง </li>
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

        <input type="hidden" name="id" value="{{ $pet->id }}">
        <table>


            <tr>
                <td>{{ Form::label('name', 'ชื่อสัตว์เลี้ยง') }} </td>
                <td>{{ Form::text('name', $pet->name, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('type_id', 'ชนิดสัตว์เลี้ยง') }}</td>
                <td>{{ Form::select('type_id', $types, Request::old('type_id'), ['class' => 'form-control']) }}
                </td>
            </tr>
            
            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสัตว์เลี้ยง') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

            @if($pet->image_url)
            <tr>
                <td><strong>รูปสัตว์เลี้ยง </strong></td>
                <td><img src="{{ URL::to($pet->image_url) }}" width="100px"></td>
            </tr> @endif

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