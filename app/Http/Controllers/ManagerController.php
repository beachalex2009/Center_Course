<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Company;
use Exception;
class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $Managers = Manager::query();
        if ($request->has('search')) {
            $Managers->where('name','like','%'.$request->search.'%');
        }
        return view('Managers.index', ['Managers'=>$Managers->paginate(20)]);




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();
        // return view ('Managers.create', compact('companies') );
        return view ('Managers.create')->with('companies',$companies);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(['name'=>'required']);

        try {
            Manager::create($request->except('_token'));
            return to_route ('Managers.index')->with('status','New Manager Added');
        } catch (Exception $e) {
            //throw $th;
            return to_route ('Managers.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Manager = Manager::findOrFail($id);
        return view('Managers.edit' , compact('Manager')) ;


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate(['name' => 'required']) ;
        try {
            //code...
        Manager::find($id)->update($request->except('_token'));
        return to_route('Managers.index')->with('status','Manager Updated');
        } catch (Exception $e) {
            //throw $th;
            return to_route('Managers.index')->with('status',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            //code...
        Manager::destroy($id);
        return to_route('Managers.index')->with('status','Manager Deleted');
        } catch (Exception $e) {
            return to_route('Managers.index')->with('status',$e->getMessage());
        }


    }
}
