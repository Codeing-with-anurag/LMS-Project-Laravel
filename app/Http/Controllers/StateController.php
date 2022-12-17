<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class StateController extends Controller
{
    public function index(){        
        return view('admin.state.index');
    }

    public function getStateList(Request $request){
        return State::getStateList($request);
    }
    public function create(Request $request){
        $country = Country::get_CountryList();
        return view('admin.state.create',compact('country'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' =>'required',
            'name' => 'required|unique:state,name',            
        ]);
         if ($validator->fails()) {
            return redirect('admin/add-state')
            ->withErrors($validator, 'state')
            ->withInput();
        }  
        $state = State::addEditState($request);
        if($state){        
            return redirect()->route('admin.state')->with("success","State add Successfully!");        
        }else{            
            return redirect()->route('admin.add-state')->with("error","Some thing went wrong!");        
        }
    }

    public function edit($id){
        $country = Country::get_CountryList();
        $state = State::find($id);
        return view('admin.state.edit',compact('country','state'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'country' =>'required',
            'name' => 'required|unique:state,name,'.$id

        ]);
         if ($validator->fails()) {
            return redirect()->route('admin.state.edit',$id)
            ->withErrors($validator, 'state')
            ->withInput();
        }  
        $state = State::addEditState($request,$id);
        if($state){        
            return redirect()->route('admin.state')->with("success","State update Successfully!");        
        }else{            
            return redirect()->route('admin.state.edit',$id)->with("error","Some thing went wrong!");        
        }
    }

    public function delete(Request $request)
    {
        $data = State::Statedelete($request->id);        
        if($data == 1){
            return Response::json(["status"=>true],200);
        }else{
            return Response::json(["status"=>false],500);
        }
        
    }
}