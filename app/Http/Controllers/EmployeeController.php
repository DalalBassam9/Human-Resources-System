<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $employees=Employee::with('department')->paginate(10);

        return EmployeeResource::collection($employees);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $path = Storage::putFile('public/store', $request->file('image'));

        $employee = Employee::create(['name'=> $request->name,
                   'department_id'=>$request->department_id,
                    'image' => $path]);

        return (new EmployeeResource($employee))->response()->setStatusCode(201);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request,Employee $employee)
    { 
        $path = Storage::putFile('public/store', $request->file('image'));

        $employee->update([
            'name' => $request->name,
            'department_id'=> $request->department_id,
            'image' => $path
         ]); 

         return  response()->json(['success'=>true],204);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {    
        $employee->delete();

        return  response()->json(['success'=>true],204);
    }
}
