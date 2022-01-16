<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use Datatables;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('getDesignation')->where('status', '1')->get();
        $designation = Designation::where('status', '1')->get();
        return view('employee.index',compact('employees','designation'));
    }

    public function employee_search(Request $request)
    {   
        
        $builder = Employee::query();
        $term = $request->all();
        if(!empty($term['name'])){
            // $builder->where('name','=',$term['name']);
            $builder->where('name', 'like', '%' . $term['name'] . '%')->get();
            
        }
        if(!empty($term['email'])){
            // $builder->where('email','=',$term['email']);
            $builder->where('email', 'like', '%' . $term['email'] . '%')->get();

        }
        if(!empty($term['designation'])){
            $builder->where('designation_id','=',$term['designation']);
        }
        $employees = $builder->orderBy('id')->get();
        $designation = Designation::where('status', '1')->get();
        return view('employee.index',compact('employees','designation'));
    }
    public function create()
    {
        $designation = Designation::where('status', '1')->get();
        return view('employee.create')->with('designation',$designation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5120',
            'email' => 'required||unique:employees,email',
            'designation' => 'required',
           
        ]);
      if($validatedData){
        try {
        $data = $request->all();
        
        if($request->image){
            $imageName = date("Ymdhis").'_'.time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('employee-image');
            $request->image->move($path, $imageName);
        }
       else{
        $imageName="";   
       }

        $employee = new Employee();
        $employee->designation_id = $data['designation'];
        $employee->status = $data['status']?$data['status']:'';
        $employee->name = $data['name']?$data['name']:'';
        $employee->email = $data['email']?$data['email']:'';
        $employee->photo = $imageName;
        $employee->save();

        $employee =  array('name' => $data['name'],
        'email' => $data['email'],
        'password'=>Str::random(10),
          );
          
       Mail::to($data['email'])->send(new \App\Mail\MyTestMail($employee));
       
        return redirect()->route('employee.index')->with('create', 'Employee Added successfully!');
       } catch (\Exception $e) {
        
        
        return redirect()->route('employee.create')->with('error',$e->getMessage());
        
      }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('getDesignation')
        ->where("id", "=", $id)
        ->first();
        $designation = Designation::all();
        //dd($designation);
        return view('employee.show',compact('employee','designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with('getDesignation')
        ->where("id", "=",$id)
        ->first();
        $designation = Designation::all();
        return view('employee.update',compact('employee','designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5120',
            'email' => 'required|email|unique:employees,email,'.$request['id'],
            'designation' => 'required',
        ]);
      if($validatedData){
        $data= $request->all(); 
        if($request->image){
            $imageName = date("Ymdhis").'_'.time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('employee-image');
            $request->image->move($path, $imageName);
        }
       else{
        $imageName="";   
       }

        $update_data =array(
        'designation_id' => $data['designation'],   
        'name' => $data['name']?$data['name']:'',
        'status' => $data['status']?$data['status']:'',
        'email' => $data['email']?$data['email']:'',
        'photo'=>$imageName,
        'updated_at' => now(),
        );
        Employee::where("id", "=",$data['id'])->update($update_data);
        Employee::where('id',$data['id'])->delete();
                
        $employee = new Employee();
        $employee->designation_id = $data['designation'];
        $employee->status = $data['status']?$data['status']:'';
        $employee->name = $data['name']?$data['name']:'';
        $employee->email = $data['email']?$data['email']:'';
        $employee->photo = $imageName;
        $employee->updated_at =now();
        $employee->save();
        return redirect()->route('employee.index')->with('create', 'Employee Updated successfully!');
      }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where("id",base64_decode($id))->delete();
        return redirect()->route('employee.index')->with('create', 'Employee Deleted successfully!');
    }
}
