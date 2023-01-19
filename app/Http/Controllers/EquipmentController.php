<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'weight'=>'required',
            'muscles_used'=>'required'
        ]);
        return Equipment::create($request->all());
        // return Equipment::create([
        //     'name'=>$request->name,
        //     'weight'=>$request->weight,
        //     'muscles_used'=>$request->muscles_used
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Equipment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return Equipment::find($id)->update(
        //     ['name'=>$request->name,
        //     'weight'=>$request->weight,
        //     'muscles_used'=>$request->muscles_used]
        // );
        $equipment = Equipment::find($id);
        $equipment ->update($request->all());
        return $equipment;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Equipment::find($id)->delete();
    }
    /**
    * Search for a name
    *
    * @param  str  $name
    * @return \Illuminate\Http\Response
    */
   public function search($name)
   {
       return Equipment::where('name','like','%'.$name.'%')->get();
   }
}
