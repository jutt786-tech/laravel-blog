<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Product;
use DemeterChain\B;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
//    protected  $branches;
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companys = Company::with('branches')->get();

        return view('company.index', compact('companys'));
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
        return view('company.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create([
            'cname' => $request->cname
        ]);
        $company->save();

//        foreach ($request->bname as $key => $value) {
//            $company->branches()->create([
//                'bname' => $request->bname[$key],
//                'location' => $request->location[$key],
//            ]);
//        }


        foreach ($request->bname as $key => $value) {
            $arr[] = new Branch([
                'bname' => $request->bname[$key],
                'location' => $request->location[$key],
            ]);
        }
        $company->branches()->saveMany($arr);



//        foreach ($request->bname as $key => $value) {
//            $arr[] =[
//                'bname' => $request->bname[$key],
//                'location' => $request->location[$key],
//            ];
//        }
//        $company->branches()->createMany($arr);



        return redirect(route('company.index'))->with('message', 'Comapny created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::find($id);
//        $branches = Branch::all();

        return view('company.create', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {




//        dd($request->all());
        $company = Company::find($id);
        $company->cname = $request->cname;
        $company->save();

        foreach ($request->bname as $key => $value){
            if (!empty($request->id[$key])) {
                $branchId = Branch::findOrFail($request->id[$key]);
                $branchId->bname = $request->bname[$key];
                $branchId->location = $request->location[$key];
                $branchId->save();
            }else{
             $branch =  new Branch();
             $branch->bname = $request->bname[$key];
             $branch->location = $request->location[$key];
             $branch->company_id =$company->id;
             $branch->save();
            }
        }



//        foreach ($request->bname as $key => $branch) {
//           Branch::updateOrCreate(
//                [
//                    'id' => $request->id[$key],
//                    'bname' => $request->bname[$key],
//                    'location' => $request->location[$key],
//                ],
//                [
//                    "company_id" => $company->id,
//
//                ]);
//        }




//        for ($i=0; $i<count($request->bname); $i++) {
//            $updateIf = [
//                'id' => $request->id[$i],
//                'bname' => $request->bname[$i],
//                'location' => $request->location[$i]
//            ];
//
//            $data = [
//                'company_id' => $request->id
//            ];
//
//            dd(Branch::updateOrCreate([$updateIf, $data]));
//        }


//        for ($i=0; $i<count($request->bname); $i++){
//
//
//            $newUser = Branch::updateOrCreate([
//                'id'    => $request->id[$i],
//                'bname' => $request->bname[$i],
//                'location'=>$request->location[$i],
//
//            ],[
//                'company_id' => $company->id,
//                'bname' => $request->bname[$i],
//                'location'=>$request->location[$i],
//            ]);
//        }



//        $d= count($request->bname);
//        dd($d);
//        for ($key = 0; $key<$d ; $key++){
//
//
//            $branch = Branch::findOrFail($request->id[$key]);
//
//            if (!$branch)  {
//                $branch->bname    = $request->bname[$key];
//                $branch->location = $request->location[$key];
//                $branch->save();
//
//            }else{
//
//                $br = new  Branch();
//                $br->bname    = $request->bname[$key];
//                $br->location = $request->location[$key];
//                $br->company_id = $company->id;
//                $br->save();
//
//            }
//
//        }

//        foreach($request->bname as $key => $value){
//
//            if (!empty($request->id[$key])){
//                $branch = Branch::findOrFail($request->id[$key]);
//                $branch->bname    = $request->bname[$key];
//                $branch->location = $request->location[$key];
//                $branch->save();
//
//            }else{
//                dd('save function call');
//                $branch = new  Branch();
//                $branch->bname    = $request->bname[$key];
//                $branch->location = $request->location[$key];
//                $branch->company_id = $company->id;
//                $branch->save();
//
//            }

  //    }



//        $cid->update($request->all());
//        $cid->branches()->sync($request->bname, $request->location);
        return redirect(route('company.index'))->with('message', 'Company updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cid = Company::find($id);
        $cid->delete();
        return redirect(route('company.index'))->with('message', 'Company Deleted sucessfully');
    }
}
