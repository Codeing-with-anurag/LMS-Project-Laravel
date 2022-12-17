<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Exam;

class ExamCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "exam_category";
    public static function getExamCategoryList($request)
    {
        if ($request->ajax()) {
            $data = ExamCategory::orderBy('id', 'desc');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.examcategory.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-flat btn-sm delete_examcategory" data-id="' . $row->id . '" ><i class="fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit Country */
    public static function addEditExamCategory($request, $id = '')
    {
        if ($id) {
            $data = ExamCategory::find($id);
        } else {
            $data = new ExamCategory();
        }
        $data->title = $request->title;
        $data->save();
        return $data;
    }

    /* Delete Country */
    public static function ExamCategorydelete($id)
    {
        ExamCategory::where('id', $id)->delete();        
        return 1;
    }

    /* Exam Category */
    public static function get_ExamCategoryList()
    {
        return ExamCategory::all();
    }
}
