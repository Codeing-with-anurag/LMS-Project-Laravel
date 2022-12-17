<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index()
    {        
        return view('admin.country.index');
    }

    public function getCountryList(Request $request){
        return Country::getCountryList($request);
    }
    public function create(Request $request){
        return view('admin.country.create');
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:country,name',            
        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.country.add')
            ->withErrors($validator, 'country')
            ->withInput();
        }  
        $country = Country::addEditCountry($request);
        if($country){        
            return redirect()->route('admin.country')->with("success","Country add Successfully!");        
        }else{            
            return redirect()->route('admin.add-country')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){
        $country = Country::find($id);
        return view('admin.country.edit',compact('country'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:country,name,'.$id,            
        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.country.edit',$id)
            ->withErrors($validator, 'country')
            ->withInput();
        }  
        $country = Country::addEditCountry($request,$id);
        if($country){        
            return redirect()->route('admin.country')->with("success","Country update Successfully!");        
        }else{            
            return redirect()->route('admin.country.edit',$id)->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request)
    {   $state = State::where('country_id',$request->id)->get();                
        if ($state->count() == 0){
            $data = Country::countrydelete($request->id);             
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
