<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use App\Models\State;
use Illuminate\Support\Facades\Response;

class Country extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "country";

    public static function getCountryList($request)
    {

        if ($request->ajax()) {
            $data = Country::orderBy('id','desc');            
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route("admin.country.edit", $row->id) . '" class="edit btn btn-success btn-flat btn-sm"><i class="fa fa-pencil-square-o"></i> </a> <a href="javascript:void(0)" class="delete btn btn-danger btn-flat btn-sm delete_counntry" data-id="' . $row->id . '" ><i class="fa-sharp fa-solid fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /* Add Edit Country */
    public static function addEditCountry($request, $id = '')
    {
        if ($id) {
            $data = Country::find($id);
        } else {
            $data = new Country();
        }
        $data->name = $request->name;
        $data->save();
        return $data;
    }

    /* Delete Country */
    public static function countrydelete($id)
    {
        Country::where('id', $id)->delete();        
        return 1;                
    }

    /* Get Country List */
    public static function get_CountryList()
    {
        return Country::all();
    }
}
