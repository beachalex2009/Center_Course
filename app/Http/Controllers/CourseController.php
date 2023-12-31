<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $Courses = Course::query();
        if ($request->has('search')) {
            $Courses->where('name', 'like', '%' . $request->search . '%')->paginate(25);
        }

        return view('Courses.index', ['Courses' => $Courses->paginate(20)]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name')->get();
        $vendors = Vendor::orderby('name')->get();
        return view('Courses.create')->with('categories', $categories)->with('vendors', $vendors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'hours' => 'required',
            'price' => 'required',
        ]);
        try {
            $Course = new Course();
            $Course->name = $request->name;
            $Course->hours = $request->hours;
            $Course->price = $request->price;
            $Course->save();
            return to_route('Courses.index')->with('status', 'New Course Added');
        } catch (Exception $e) {
            return to_route('Courses.index')->with('status', $e->getMessage());
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
        $Course = Course::findOrFail($id);
        return view('Courses.edit', compact('Course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'hours' => 'required',
            'price' => 'required',

        ]);

        try {
            Course::find($id)->update($request->except('_token'));
            return to_route('Courses.index')->with('status', 'Course Updated');
        } catch (Exception $e) {
            return to_route('Courses.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            course::destroy($id);
            return to_route('Courses.index')->with('status', 'course Deleted');
        } catch (Exception $e) {
            return to_route('Courses.index')->with('status', $e->getMessage());
        }
    }
}
