<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index()
    {
        return view('admin.test.index');
    }

    public function getTestList(Request $request)
    {
        return Test::getTestList($request);
    }
    public function create(Request $request)
    {
        $subject = Subject::all();
        return view('admin.test.create',compact('subject'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'name' => 'required|unique:test,name',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.test.add')
                ->withErrors($validator, 'test')
                ->withInput();
        }
        $test = Test::addEditTest($request);
        if ($test) {
            return redirect()->route('admin.test')->with("success", "Test add Successfully!");
        } else {
            return redirect()->route('admin.add-test')->with("error", "Some thing went wrong!");
        }
    }

    public function edit($id)
    {
        $subject = Subject::all();
        $test = Test::find($id);
        return view('admin.test.edit', compact('subject','test'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',            
            'name' => 'required|unique:test,name,' . $id,
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.test.edit', $id)
                ->withErrors($validator, 'test')
                ->withInput();
        }
        $test = Test::addEditTest($request, $id);
        if ($test) {
            return redirect()->route('admin.test')->with("success", "Test update Successfully!");
        } else {
            return redirect()->route('admin.test.edit', $id)->with("error", "Some thing went wrong!");
        }
    }

    public function delete(Request $request)
    {
        $data = Test::testdelete($request->id);
        if ($data == 1) {
            echo json_encode(["status" => 1]);
            exit;
        } else {
            echo json_encode(["status" => 0]);
            exit;
        }
    }
}