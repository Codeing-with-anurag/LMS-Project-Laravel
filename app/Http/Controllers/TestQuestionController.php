<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TestQuestion;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class TestQuestionController extends Controller
{
    public function index(){        
        return view('admin.test_question.index');
    }

    public function getQuestionList(Request $request){
        return TestQuestion::getQuestionList($request);
    }
    public function create(Request $request){
        $test = TestQuestion::get_TestList();
        return view('admin.test_question.create',compact('test'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test' =>'required',
            'question' => 'required|unique:test_question,question',            
            'option_1' => 'required|unique:test_question,option_1',
            'option_2' => 'required|unique:test_question,option_2',
            'option_3' => 'required|unique:test_question,option_2',
            'option_4' => 'required|unique:test_question,option_2',
            'true_answer' => 'required|unique:test_question,true_answer',
            'solution' => 'required|unique:test_question,solution',            
        ]);
         if ($validator->fails()) {
            return redirect('admin/add-question')
            ->withErrors($validator, 'testquestion')
            ->withInput();
        }  
        $question = TestQuestion::addEditTestQuestion($request);
        if($question){        
            return redirect()->route('admin.question')->with("success","Test Question add Successfully!");        
        }else{            
            return redirect()->route('admin.add-question')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){
        $test = TestQuestion::get_TestList();
        $state = TestQuestion::find($id);
        return view('admin.test_question.edit',compact('country','state'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'test' =>'required',
            'question' => 'required|unique:test_question,question',            
            'option_1' => 'required|unique:test_question,option_1',
            'option_2' => 'required|unique:test_question,option_2',
            'option_3' => 'required|unique:test_question,option_2',
            'option_4' => 'required|unique:test_question,option_2',
            'true_answer' => 'required|unique:test_question,true_answer',
            'solution' => 'required|unique:test_question,solution',            
        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.state.edit',$id)
            ->withErrors($validator, 'state')
            ->withInput();
        }  
        $question = TestQuestion::addEditTestQuestion($request,$id);
        if($question){        
            return redirect()->route('admin.state')->with("success","Test Question update Successfully!");        
        }else{            
            return redirect()->route('admin.state.edit',$id)->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request)
    {
        $data = TestQuestion::Statedelete($request->id);        
        if($data == 1){
            return Response::json(["status"=>true],200);
        }else{
            return Response::json(["status"=>false],500);
        }
        
    }
    public function show($id){
        $testquestion = TestQuestion::find($id);
        return view('admin.test_question.show',compact('testquestion'));
    }
}