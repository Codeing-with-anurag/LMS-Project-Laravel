<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\Plan;
use App\Models\State;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index(){
        return view('admin.exam.index');
    }

    public function getExamList(Request $request){
        return Exam::getExamList($request);
    }
    public function get_StateList(Request $request)
    {
        $country = $request->country_id;        
        $state  = State::get_StateList($country);
        return Response::json($state);
    }
    public function create(Request $request){
        $country = Country::get_CountryList();        
        $examCategory = ExamCategory::get_ExamCategoryList();
        return view('admin.exam.create',compact('country','examCategory'));
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'state' => 'required',
            'examcategory' => 'required',
            'name' => 'required|unique:exam,name',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('admin.exam.add')
                ->withErrors($validator, 'exam')
                ->withInput();
        }
        $Exam = Exam::addEditExam($request);
        if ($Exam) {
            return redirect()
                ->route('admin.exam')
                ->with('success', 'Exam update Successfully!');
        } else {
            return redirect()
                ->route('admin.exam.add')
                ->with('error', 'Some thing went wrong!');
        }
    }

    public function edit($id){
        $exam = Exam::find($id);
        $country = Country::get_CountryList();        
        $state = State::all();        
        $examCategory = ExamCategory::get_ExamCategoryList();
        return view('admin.exam.edit', compact('exam','country','state','examCategory'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:exam,name,'. $id,
            'country' => 'required',
            'state' => 'required',
            'examcategory' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('admin.exam.edit', $id)
                ->withErrors($validator, 'exam')
                ->withInput();
        }
        $Exam = Exam::addEditExam($request, $id);
        if ($Exam) {
            return redirect()
                ->route('admin.exam')
                ->with('success', 'Exam update Successfully!');
        } else {
            return redirect()
                ->route('admin.Exam.edit', $id)
                ->with('error', 'Some thing went wrong!');
        }
    }

    public function delete(Request $request){            
        $plan = Plan::where('exam_id',$request->id)->get();        
        if ($plan->count() == 0){          
            $data = Exam::Examdelete($request->id);
            if($data == 1){
                echo json_encode(["status"=>1],true);exit;
            }else{
                echo json_encode(["status"=>0],true);exit;
            }                  
        }else{
            echo json_encode(["status"=>2],true);exit;
        }       
    }
}