<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Exception;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return $branches;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'location' => 'required',
        ]);
        try {
            $branch = new Branch();
            $branch->name = $request->name;
            $branch->mobile = $request->mobile;
            $branch->location = $request->location;
            $branch->company_id = $request->company_id;
            $branch->save();
            return response()->json(['status' => 'Done']);
        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getMessage()
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $branch = branch::findOrFail($id);
            return response();
        } catch (Exception $e) {
            return response()->json(['status' => 'Done']);
        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getMessage()
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'location' => 'required',
        ]);
        try {
            $branch = branch::findOrFail($id);
            $branch->name = $request->name;
            $branch->mobile = $request->mobile;
            $branch->location = $request->location;
            $branch->company_id = $request->company_id;
            $branch->save();
            return response()->json(['status' => 'Done']);
        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $branch = branch::findOrFail($id);
            $branch->delete();
            return response();
        } catch (Exception $e) {
            return response([
                'branch' => $branch,
                'status' => $e->getMessage()
            ]);
        }
    }
}
