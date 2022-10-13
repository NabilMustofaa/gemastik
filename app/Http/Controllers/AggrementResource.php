<?php

namespace App\Http\Controllers;

use App\Models\Aggrement;
use Illuminate\Http\Request;

class AggrementResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'sender_id'=>'required',
            'receiver_id'=>'required',
            'title'=>'required',
            'price'=>'required',
            'document'=>'required',
        ]);
        
        $validated['file_path']=$request->file('document')->store('aggrements');
        $validated['negotiation_position_client']=true;
        $validated['status']='negotiation';
        Aggrement::create($validated);
        return redirect()->back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aggrement  $aggrement
     * @return \Illuminate\Http\Response
     */
    public function show(Aggrement $aggrement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aggrement  $aggrement
     * @return \Illuminate\Http\Response
     */
    public function edit(Aggrement $aggrement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aggrement  $aggrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aggrement $aggrement)
    {
        $validated=$request->validate([
            'price'=>'required',
        ]);
        $validated['negotiation_position_client']=false;
        $aggrement->update($validated);
        return redirect()->back() ;
    }

    public function accept($id)
    {
        $aggrement=Aggrement::find($id);
        $aggrement->update([
            'status'=>'accepted'
        ]);
        return redirect()->back() ;
    }

    public function finish($id)
    {
        $aggrement=Aggrement::find($id);
        $aggrement->update([
            'status'=>'finished'
        ]);
        return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aggrement  $aggrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aggrement $aggrement)
    {
        //
    }
}
