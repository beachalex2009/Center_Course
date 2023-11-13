<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;

use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::paginate(20);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::orderBy('name')->get();
        $branches = Branch::orderby('name')->get();
        return view('employees.create')->with('users', $users)->with('branches', $branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'salary' => 'required',
            ]
        );

        try {
            //code...
            // $employees = new Employee();
            // $employees->job_title = $request->job_title;
            // $employees->job_title = $request->salary;
            // $employees->job_title = $request->hire_date;
            // $employees->save();
            Employee::created($request->except('_token'));
            return to_route('Employees.index')->with('status', 'Employees Added');
        } catch (Exception $e) {
            //throw $th;
            return to_route('Employees.index')->with('status', $e->getMessage());
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
        $employee = Employee::findOrfail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(['salary' => 'required']);
        try {
            // $employees = Employee::find($id);
            // $employees->job_title = $request->job_title;
            // $employees->job_title = $request->salary;
            // $employees->job_title = $request->hire_date;
            // $employees->save();
            Employee::find($id)->update($request->except('_token'));
            return to_route('Employees.index')->with('status', 'Employees Updated');
        } catch (Exception $e) {
            //throw $th;
            return to_route('Employees.index')->with('status', $e->getMessage());
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
            Employee::destroy($id);
            return to_route('Employees.index')->with('status', 'Employees Deleted');
        } catch (Exception $e) {
            //throw $th;
            return to_route('Employees.index')->with('status', $e->getMessage());
        }
    }
}
