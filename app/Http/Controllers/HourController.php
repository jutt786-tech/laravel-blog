<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $hours=  Hour::all();
        return  view('hour.index',compact('hours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $contacts = Contact::all();
        return  view('hour.create',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $hour= new Hour($request->all());
        $hour->save();
        return redirect(route('hour.index'))->with('message','Hour Created sucessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
      $hour = Hour::find($id);
        $contacts = Contact::all();
        return  view('hour.create',compact('hour','contacts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $hour = Hour::find($id);
        $hour->update($request->all());
        return redirect(route('hour.index'))->with('message','Hour updated sucessfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hour = Hour::find($id);
        $hour->delete();
        return redirect(route('hour.index'))->with('message','Hour DELETED sucessfully');


    }
}
