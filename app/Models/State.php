<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\Constraint\Count;
use Yajra\DataTables\Facades\DataTables;

class State extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'state';

    public function getCountry()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public static function getStateList($request)
    {
        if ($request->ajax()) {
            $data = State::with('getCountry');                           
            $data->orderBy('id','desc');            
            return DataTables::of($data)
                ->addColumn('country', function ($row) {
                    return $row->getCountry->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.state.edit', $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm btn-flat delete_state" data-id="' . $row->id . '" ><i class=" fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit State */
    public static function addEditState($request, $id = '')
    {
        if ($id) {
            $data = State::find($id);
        } else {
            $data = new State();
        }
        $data->country_id = $request->country;
        $data->name = $request->name;
        $data->save();
        return $data;
    }

    /* Delete State */
    public static function Statedelete($id)
    {
        return State::where('id', $id)->delete();
    }

    /* Get State List */
    public static function get_StateList($country='')
    {
        return State::where('country_id', $country)->get();
    }
}
