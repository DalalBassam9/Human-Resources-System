<?php

namespace App\Http\Controllers;

use App\GovernmentBody;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGovernmentBodyRequest;
use App\Http\Requests\UpdateGovernmentBodyRequest;
use App\Http\Resources\GovernmentBodyResource;

class GovernmentBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governmentBodies=GovernmentBody::with('departments.name')->paginate(10);

         return GovernmentBodyResource::collection($governmentBodies);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreGovernmentBodyRequest $request)
    {    
        $governmentBody= GovernmentBody::create(['name'=> $request->name]);
     
        return (new GovernmentBodyResource($governmentBody))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GovernmentBody $governmentBody)
    {
        return new GovernmentBodyResource($governmentBody);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGovernmentBodyRequest $request, GovernmentBody $governmentBody)
    {
         $governmentBody->update(['name'=>$request->name]);  
   
         return  response()->json(['success'=>true],204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GovernmentBody $governmentBody)
    {
         $governmentBody->delete();

         return  response()->json(['success'=>true],204);   
    }
}
