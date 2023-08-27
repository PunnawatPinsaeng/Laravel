<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Type;
use Config, Validator;

class TypeController extends Controller
{
    
    public function index() {

        $types = Type::all();
        return view('type/index' , compact('types'));
    }

    public function search(Request $request) {

        $query = $request->q;

        if($query) {

            $types = Type::where('name', 'like', '%'.$query.'%')
            ->get();
        } 
        else {

            $types = Type::all();
        }

        return view('type/index', compact('types'));
    }

    public function edit($id = null) {

        $type = Type::find($id);

        if ($id) {

            $type = Type::where('id' , $id)->first();
            return view('type/edit')
            ->with('type' , $type);
        }
        else {

            return view('type/add')
            ->with('type' , $type);
        }

    }

    public function update(Request $request) {

        $rules = array(

            'name' => 'required',
        );

        $messages = array(

            'numeric' => 'กรุณากรอกข้อมูล:attribute ให้เป็นตัวเลข',
        );

        $id = $request->id;
        $temp = array(

            'name' => $request->name,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {

            return redirect('type/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $type = Type::find($id);
        $type->name = $request->name;
        $type->save();

        return redirect('type')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');;
    }

    
    public function insert(Request $request) {

        $rules = array(

            'name' => 'required',
        );

        $messages = array(

            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 
        );

        $id = $request->id;
        $temp = array(

            'name' => $request->name,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {

            return redirect('type/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $type = new Type();
        $type->name = $request->name;
        $type->save();

        return redirect('type')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');;
    }

    public function remove($id) {

        Type::find($id)->delete();
        return redirect('type')
        ->with('ok', true)
        ->with('msg', 'ลบข้อมูลสําเร็จ');
    }

}
