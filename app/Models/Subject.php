<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Plan;

class Subject extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subjects';

    public function getPlan()
    {
        return $this->hasOne(Plan::class, 'id', 'plan_id');
    }
    public static function getSubjectList($request)
    {
        if ($request->ajax()) {
            $data = Subject::with('getPlan');
            $data->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addColumn('plan', function ($row) {
                    return $row->getPlan->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.subject.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm btn-flat delete_subject" data-id="' . $row->id . '" ><i class=" fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit State */
    public static function addEditSubject($request, $id = '')
    {
        if ($id) {
            $data = Subject::find($id);
        } else {
            $data = new Subject();
        }
        $data->plan_id = $request->plan;
        $data->name = $request->name;
        $data->save();
        return $data;
    }

    /* Delete State */
    public static function Subjectdelete($id)
    {
        return Subject::where('id', $id)->delete();
    }
}
