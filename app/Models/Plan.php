<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Exam;
use Yajra\DataTables\Facades\DataTables;
use App\Helper\Helpers;

class Plan extends Model
{    
    use HasFactory, SoftDeletes;
    protected $table = 'plans';

    public function getExam(){
        return $this->hasOne(Exam::class,'id','exam_id');
    }   
    public static function getPlanList($request)
    {
        if ($request->ajax()) {
            $data = Plan::with(['getExam']);
            if($request->order){                
                $data->orderBy('id','desc');
            }
            return DataTables::of($data)           
            ->addColumn('exam', function ($row) {                              
                return $row->getExam->name;
            })
            ->addColumn('unlimited_test_attempt', function ($row) {                              
                return Helpers::getunlimitedTestAttempt($row->unlimited_test_attempt);
            })
            ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.plan.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-flat btn-sm delete_plan" data-id="' . $row->id . '" ><i class="fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
             })
            ->rawColumns(['unlimited_test_attempt','action'])
            ->make(true);
        }
    }
    /* Add Edit Plan */
    public static function addEditPlan($request, $id = '')
    {       
        if ($id) {
            $data = Plan::find($id);
        } else {
            $data = new Plan();
        }
        $data->exam_id   = $request->exam;
        $data->name  = $request->name;
        $data->year  = $request->year;
        $data->price	  = $request->price	;
        $data->validity  = $request->validity;
        $data->unlimited_test_attempt  = $request->unlimited_test_attempt;
        $data->attempt = ($request->unlimited_test_attempt == 0) ? $request->attempt : null;
        $data->description  = $request->description;
        $data->save();
        return $data;
    }

    /* Delete Plan */
    public static function Plandelete($id)
    {
        return Plan::where('id', $id)->delete();
    }    

    /* Get Plan List */
    public static function get_PlanList()
    {
        return Plan::all();
    }
}
