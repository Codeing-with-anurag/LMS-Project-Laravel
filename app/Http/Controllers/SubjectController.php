<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Subject;
use App\Models\Plan;
use App\Models\Test;

class SubjectController extends Controller
{
    public function index(){        
        return view('admin.subject.index');
    }

    public function getSubjectList(Request $request){
        return Subject::getSubjectList($request);
    }
    public function create(Request $request){
        $plan = Plan::get_PlanList();
        return view('admin.subject.create',compact('plan'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan' =>'required',
            'name' => 'required|unique:subjects,name',            
        ]);
         if ($validator->fails()) {
            return redirect('admin/add-subject')
            ->withErrors($validator, 'state')
            ->withInput();
        }  
        $state = Subject::addEditSubject($request);
        if($state){        
            return redirect()->route('admin.subject')->with("success","State add Successfully!");        
        }else{            
            return redirect()->route('admin.add-subject')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){       
        $plan = Plan::get_PlanList(); 
        $subject = Subject::find($id);
        return view('admin.subject.edit',compact('plan','subject'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'plan' =>'required',
            'name' => 'required|unique:subjects,name,'.$id

        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.subject.edit',$id)
            ->withErrors($validator, 'subject')
            ->withInput();
        }  
        $subject = Subject::addEditSubject($request,$id);
        if($subject){        
            return redirect()->route('admin.subject')->with("success","Subject update Successfully!");        
        }else{            
            return redirect()->route('admin.subject.edit',$id)->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request)
    {    
       $test = Test::where('subject_id',$request->id)->get();                
        if ($test->count() == 0){
            $data = Subject::Subjectdelete($request->id);               
            if($data == 1){
                echo json_encode(["status"=>1]);exit;
            }else{
                echo json_encode(["status"=>0]);exit;
            }                  
        }else{
            echo json_encode(["status"=>2]);exit;       
        }        
    }
}
