<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Country;
use App\Models\State;
use App\Models\ExamCategory;

class Exam extends Model {

    use HasFactory,
        SoftDeletes;

    protected $table = 'exam';

    public function getCountry() {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function getState() {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function getExamCategory() {
        return $this->hasOne(ExamCategory::class, 'id', 'exam_category_id');
    }

    public static function getExamList($request) {
        if ($request->ajax()) {
            $data = Exam::with(['getCountry', 'getState', 'getExamCategory']);
            if ($request->order) {
                $data->orderBy('id', 'desc');
            }
            return DataTables::of($data)
                            ->addColumn('country', function ($row) {
                                return $row->getCountry->name;
                            })
                            ->addColumn('state', function ($row) {
                                return $row->getState->name;
                            })
                            ->addColumn('category', function ($row) {
                                return $row->getExamCategory->title;
                            })
                            ->addColumn('action', function ($row) {
                                $actionBtn = '<a href="' . route('admin.exam.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-flat btn-sm delete_exam" data-id="' . $row->id . '" ><i class="fa-sharp fa-solid fa fa-trash"></i></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    /* Add Edit Country */

    public static function addEditExam($request, $id = '') {
        if ($id) {
            $data = Exam::find($id);
        } else {
            $data = new Exam();
        }
        $data->exam_category_id = $request->examcategory;
        $data->country_id = $request->country;
        $data->state_id = $request->state;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return $data;
    }

    /* Delete Exam */

    public static function Examdelete($id) {
        Exam::where('id', $id)->delete();
        return 1;
    }

}
