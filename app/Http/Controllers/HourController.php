<?php

namespace App\Http\Controllers;

use App\Branch;
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
       $branches  =  Branch::with('hours')->get();

        return  view('hour.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches     = Branch::all();
        return  view('hour.create',compact('branches'));
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
//            dd($request->all());
       $bid = Branch::findOrFail($request->branch_id);
        $bid->id = $request->branch_id;
        $bid->save();

        foreach ($request->hour as $key => $h){
          $hours = new Hour();
          $hours->hour = $h;
          $hours->branch_id = $bid->id;

          $hours->save();
        }

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
        $br = Branch::with('hours')->find($id);

//        $branches = Branch::all();
        return  view('hour.create',compact('br'));

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
//dd($request->all());
        $bid = Branch::find($id);
        $bid->bname = $request->bname;
        $bid->save();

        foreach ($request->hour as $key => $value){
            if (!empty($request->id[$key])){
                $hid = Hour::findOrFail($request->id[$key]);
                $hid->hour  =  $request->hour[$key];
                $hid->save();

            }else{
              $h = new  Hour();
              $h->hour = $request->hour[$key];
              $h->branch_id =$bid->id;
              $h->save();

            }
        }

//        $hour->update($request->all());
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
        $hour = Branch::find($id);
        $hour->delete();
        return redirect(route('hour.index'))->with('message','Hour DELETED sucessfully');


    }
}
