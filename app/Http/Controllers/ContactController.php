<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $branches = Branch::with('contact')->get();

       return  view('contect.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches = Branch::all();
        return  view('contect.create',compact('branches'));
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
//dd($request->all());
        $branch =Branch::FindorFail( $request->branch_id);
        $branch->id = $request->branch_id;
        $branch->save();
//        dd('ok');
        foreach ($request->phone as $contact){
            $c =  new Contact();
            $c->phone = $contact;
            $c->branch_id = $branch->id;
            $c->save();
        }

        return  redirect(route('contect.index'))->with('message','Data store sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
       $br  = Branch::with('contact')->find($id);
        $branches = Branch::all();

        return  view('contect.create',compact('br','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd($request->all());
        $branchid = Branch::findOrFail($id);
        $branchid->bname = $request->bname;
        $branchid->save();

        foreach ($request->phone as $key => $value){

            if (!empty($request->id[$key])){

                $cid         =  Contact::findOrFail( $request->id[$key]);
                $cid->phone  =  $request->phone[$key];
                $cid->save();

            }else{
                $c = new Contact();
                $c->phone        =  $request->phone[$key];
                $c->branch_id    =  $branchid->id;
               $c->save();
            }
        }


        return redirect(route('contect.index'))->with('message','Data updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $cid =  Branch::find($id);
       $cid->delete();
       return redirect(route('contect.index'))->with('message','Data Deleted sucessfully');

    }
}
