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
       $contacts = Contact:: with('branch')->get();
//       dd($contacts);
       return  view('contect.index',compact('contacts'));
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
        $cid = new Contact($request->all());
        $cid->save();
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
       $contect = Contact::find($id);
       return  view('contect.create',compact('contect'));
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
        $cid =  Contact::find($id);
        $cid->update($request->all());
        $cid->save();
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
       $cid =  Contact::find($id);
       $cid->delete();
       return redirect(route('contect.index'))->with('message','Data Deleted sucessfully');

    }
}
