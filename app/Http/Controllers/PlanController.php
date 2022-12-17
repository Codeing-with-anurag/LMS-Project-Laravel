<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Plan;
use  Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function index(){        
        return view('admin.plan.index');
    }

    public function getPlanList(Request $request){
        return Plan::getPlanList($request);
    }
    public function create(Request $request){
        $exam = Exam::all();
        return view('admin.plan.create',compact('exam'));
    }

    function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'exam' => 'required', 
            'name' => 'required|unique:plans,name', 
            'year' => 'required|numeric', 
            'price' => 'required', 
            'validity' => 'required',
            'unlimited_test_attempt'=>"required",            
            'attempt' =>  'required_if:unlimited_test_attempt,==,0', 
        ]);
        $message = array(
            'required_if' =>'Attempt field is required.'
        );
       if ($validator->fails($message)) {
            return redirect()->route('admin.plan.add')
            ->withErrors($validator, 'plan')
            ->withInput();
        }  
        $plan = Plan::addEditPlan($request);
        if($plan){        
            return redirect()->route('admin.plan')->with("success","Plan add Successfully!");        
        }else{            
            return redirect()->route('admin.add-plan')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){
        $exam = Exam::all();
        $plan = Plan::find($id);
        return view('admin.plan.edit',compact('plan','exam'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'exam' => 'required',             
            'name' => 'required|unique:plans,name,'.$id,            
            'year' => 'required|numeric', 
            'price' => 'required', 
            'validity' => 'required',
            'unlimited_test_attempt'=>"required",
            'attempt' =>  'required_if:unlimited_test_attempt,==,0', 
        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.plan.edit',$id)
            ->withErrors($validator, 'plan')
            ->withInput();
        }  
        $plan = Plan::addEditPlan($request,$id);
        if($plan){        
            return redirect()->route('admin.plan')->with("success","Plan update Successfully!");        
        }else{            
            return redirect()->route('admin.plan.edit',$id)->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request)
    {  $exam = Plan::where('id',$request->id)->get();
        if(empty($state)){
            $data = Plan::countrydelete($request->id);        
            if($data == 1){
                echo json_encode(["status"=>1]);exit;
            }else{
                echo json_encode(["status"=>2]);exit;
            }                  
        }else{
            echo json_encode(["status"=>0]);exit;       
        }
    }
}