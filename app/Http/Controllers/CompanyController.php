<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companys = Company::with('branches')->get();
        return  view('company.index', compact('companys'));
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
        return  view('company.create',compact('branches'));
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
//        $product =new Company($request->all());
////        $product->save();
////        $product->branches()->attach($request->branch_id);
////            dd($product);


        $user= Company::create([
            'cname' => $request->cname,
        ]);
         $user->branches()->attach($request->branch_id);
        return  redirect(route('company.index'))->with('message','Comapny created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $company =  Company::find($id);
        $branches = Branch::all();

        return  view('company.create',compact('company','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $cid = Company::find($id);
        $cid->update($request->all());
        $cid->branches()->sync($request->batch_id);
        return redirect(route('company.index'))->with('message','Company updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cid= Company::find($id);
        $cid->delete();
        return redirect(route('company.index'))->with('message','Company Deleted sucessfully');
    }
}
