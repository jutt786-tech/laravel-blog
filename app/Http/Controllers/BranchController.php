<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Contact;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $branches = Branch::with('hours','contact')->get();
//      dd($branches);
      return  view('branch.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts= Contact::all();

        return view('branch.create',compact('contacts'));
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
        $branch = new Branch($request->all());
        $branch->save();
//       $branch =  Branch::create([
//            'bname'    => $request->bname,
//            'location' => $request->location,
//        ]);
//        $branch->contact()->attach($request->contact_id);
        return redirect(route('branch.index'))->with('message','Branch created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $branch =  Branch::find($id);
        $contacts= Contact::all();

        return  view('branch.create',compact('branch','contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $bid = Branch::find($id);
        $bid->update($request->all());

//        $bid->contact()->sync($request->contact_id);
        return redirect(route('branch.index'))->with('message','Branch updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $bid = Branch::find($id);
        $bid->delete();
        return  redirect(route('branch.index'))->with('message','Branch Deleted sucessfuly');
    }
}
