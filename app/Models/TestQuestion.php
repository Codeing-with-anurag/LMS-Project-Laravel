<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class TestQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'test_question';

    public function getTest()
    {
        return $this->hasOne(Test::class, 'id', 'test_id');
    }

    /* Get Question List*/
    public static function getQuestionList($request)
    {
        if ($request->ajax()) {
            $data = TestQuestion::with('getTest');                           
            $data->orderBy('id','desc');            
            return DataTables::of($data)
                ->addColumn('test', function ($row) {
                    return $row->getTest->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.question.show', $row->id) . '" class="edit btn btn-primary btn-flat btn-sm"><i class="fa fa-eye"></i> </a> <a href="' . route('admin.question.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm btn-flat delete_question" data-id="' . $row->id . '" ><i class=" fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit Question */
    public static function addEditTestQuestion($request, $id = ''){
        if ($id) {
            $data = TestQuestion::find($id);
        } else {
            $data = new TestQuestion();
        }
        $data->test_id = $request->test;
        $data->question = $request->question;
        $data->option_1 = $request->option_1;
        $data->option_2 = $request->option_2;
        $data->option_3 = $request->option_3;
        $data->option_4 = $request->option_4;
        $data->true_answer = $request->true_answer;
        $data->solution = $request->solution;        
        
        $data->save();
        return $data;
    }

    /* Delete State */
    public static function Statedelete($id){
        return TestQuestion::where('id', $id)->delete();
    }

    /* Get Test List */
    public static function get_TestList(){
        return Test::all();
    }
}
