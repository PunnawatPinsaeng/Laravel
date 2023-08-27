<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Type;
use Config, Validator;

class PetController extends Controller
{
    
    public function index() {

        $pets = Pet::all();
        return view('pet/index' , compact('pets'));
    }

    public function search(Request $request) {

        $query = $request->q;

        if($query) {

            $pets = Pet::where('name', 'like', '%'.$query.'%')
            ->get();
        } 
        else {

            $pets = Pet::all();
        }

        return view('pet/index', compact('pets'));
    }

    public function edit($id = null) {

        $types = Type::pluck('name' , 'id')->prepend('เลือกรายการ' , '');

        if ($id) {

            $pet = Pet::where('id' , $id)->first();
            return view('pet/edit')
            ->with('pet' , $pet)
            ->with('types' , $types);
        }
        else {

            return view('pet/add')
            ->with('types' , $types);
        }

    }

    public function update(Request $request) {

        $rules = array(

            'name' => 'required',
            'type_id' => 'required|numeric',
        );

        $messages = array(

            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 
            'numeric' => 'กรุณากรอกข้อมูล:attribute ให้เป็นตัวเลข',
        );

        $id = $request->id;
        $temp = array(

            'name' => $request->name,
            'type_id' => $request->type_id,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {

            return redirect('pet/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $pet = Pet::find($id);
        $pet->name = $request->name;
        $pet->type_id = $request->type_id;
        $pet->save();

        if($request->hasFile('image')) {

            $f = $request->file('image');
            $upload_to = 'upload/images';

            // get path
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
            // upload file
            $f->move($absolute_path, $f->getClientOriginalName());

            // save image path to database
            $pet->image_url = $relative_path;
            $pet->save();
        }

        return redirect('pet')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');;
    }

    
    public function insert(Request $request) {

        $rules = array(

            'name' => 'required',
            'type_id' => 'required|numeric',
        );

        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 
            'numeric' => 'กรุณากรอกข้อมูล:attribute ให้เป็นตัวเลข',
        );

        $id = $request->id;
        $temp = array(

            'name' => $request->name,
            'type_id' => $request->type_id,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {

            return redirect('pet/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $pet = new Pet();
        $pet->name = $request->name;
        $pet->type_id = $request->type_id;
        $pet->save();

        if($request->hasFile('image')) {

            $f = $request->file('image');
            $upload_to = 'upload/images';

            // get path
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
            // upload file
            $f->move($absolute_path, $f->getClientOriginalName());

            // save image path to database
            $pet->image_url = $relative_path;
            $pet->save();
        }

        return redirect('pet')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');;
    }

    public function remove($id) {

        Pet::find($id)->delete();
        return redirect('pet')
        ->with('ok', true)
        ->with('msg', 'ลบข้อมูลสําเร็จ');
    }

}
