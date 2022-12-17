<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;

class Test extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'test';
    public function getSubject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
    public static function getTestList($request)
    {

        if ($request->ajax()) {
            $data = Test::with('getSubject');
            if ($request->order) {
                $data->orderBy('id', 'desc');
            }
            return DataTables::of($data)
                ->addColumn('subject', function ($row) {
                    return $row->getSubject->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route("admin.test.edit", $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-flat btn-sm delete_test" data-id="' . $row->id . '" ><i class="fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit Test */
    public static function addEditTest($request, $id = '')
    {
        if ($id) {
            $data = Test::find($id);
        } else {
            $data = new Test();
        }
        $data->subject_id = $request->subject;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return $data;
    }

    /* Delete Country */
    public static function testdelete($id)
    {
        Test::where('id', $id)->delete();
        return 1;
    }

    /* Get Subject List */
    public static function get_SubjectList()
    {
        return Subject::all();
    } 
}
