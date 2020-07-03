<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:companies',
            'email' => 'required',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);

        try{

            $image_image = $request->file('logo');
            $image_filename = time().'.'.$image_image->getClientOriginalExtension();
            $image_path = storage_path('app/public/Logo_images');
            $image_image->move($image_path,$image_filename);

            $data['logo'] = $image_filename;

            $form = Company::create($data);
        }
        catch(Exception $e){

        }
        return redirect()->back()->with('flash_message_success','Company added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyDetails = Company::FindorFail($id);
        return view('admin.companies.edit', compact('companyDetails'));
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
        $companyDetails = Company::findOrFail($id);
        $data = $request->all();
        try{

            $image_image = $request->file('logo');
            $image_filename = time().'.'.$image_image->getClientOriginalExtension();
            $image_path = storage_path('app/public/Logo_images');
            $image_image->move($image_path,$image_filename);

            $data['logo'] = $image_filename;

        }
        catch(Exception $e){

        }

        $companyDetails->update($data);
        return redirect()->route('companies.index')->with('flash_message_success','Company Details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('flash_message_success','Gallery Image deleted successfully!');
    }
}
 