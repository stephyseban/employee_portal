<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        // dd($designation);
        return view('designation.index',compact('designations'));
        
    }
    public function create()
    {
        return view('designation.create'); 
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'name' => 'required|unique:designations,designation_name',
           
        ]);
      if($validatedData){
        try {
        $data = $request->all();
        $designation = new Designation();
        $designation->status = $data['status']?$data['status']:'1';
        $designation->designation_name = $data['name']?$data['name']:'';
        $designation->save();
        return redirect()->route('designation.index')->with('create', 'Designation Added successfully!');
       } catch (\Exception $e) {
        return redirect()->route('designation.create')->with('error',$e->getMessage());
        
      }
      }
    }

    public function edit($id)
    {
        $designation=Designation::select("*")
        ->where("id", "=", $id)
        ->first();
        return view('designation.update',compact('designation'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:designations,designation_name,'.$request->id,
            'status' => 'required',
        ]);
      if($validatedData){
        $data= $request->all();  
        $update_data =array(
        'designation_name' => $data['name']?$data['name']:'',
        'status' => $data['status']?$data['status']:1,
        'updated_at' => now(),
        );
        Designation::where("id", "=",$data['id'])->update($update_data);
        return redirect()->route('designation.index')->with('create', 'designation Updated successfully!');
      }
    }

    public function destroy($id)
    {
        Designation::where("id",$id)->delete();
        return redirect()->route('designation.index')->with('create', 'Designation Deleted successfully!');
    }
    public function show($id)
    {
        $designation = Designation::all()
        ->where("id", "=", $id)
        ->first();
        return view('designation.show',compact('designation'));
    }
   
}
