<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\ExamCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ExamCategoryController extends Controller
{
    public function index(){        
        return view('admin.examcategory.index');
    }

    public function getExamCategoryList(Request $request){
        return ExamCategory::getExamCategoryList($request);
    }
    public function create(Request $request){        
        return view('admin.examcategory.create');
    }

    function store(Request $request){

        $validator = Validator::make($request->all(), [            
            'title' => 'required|unique:exam_category,title'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.examcategory.add')
            ->withErrors($validator, 'examcategory')
            ->withInput();
        }  
        $state = ExamCategory::addEditExamCategory($request);
        if($state){        
            return redirect()->route('admin.examcategory')->with("success","Exam Category add Successfully!");        
        }else{            
            return redirect()->route('admin.examcategory.add')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){        
        $examcategory = ExamCategory::find($id);
        return view('admin.examcategory.edit',compact('examcategory'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [         
            'title' => 'required|unique:exam_category,title,except'.$id
        ]);
         if ($validator->fails()) {            
            return redirect()->route('admin.examcategory.edit',$id)
            ->withErrors($validator, 'examcategory')
            ->withInput();
        }  
        $country = ExamCategory::addEditExamCategory($request,$id);
        if($country){        
            return redirect()->route('admin.examcategory')->with("success","Exam Category update Successfully!");        
        }else{            
            return redirect()->route('admin.examcategory.edit')->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request){        
        $exam = Exam::where('exam_category_id',$request->id)->get();
        if ($exam->count() == 0){
            $data = ExamCategory::ExamCategorydelete($request->id);            
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