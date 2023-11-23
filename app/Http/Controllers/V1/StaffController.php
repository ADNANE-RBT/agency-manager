<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Display a listing of the model
    public function index()
    {
        try {
            return response()->json(Staff::paginate());
            //return view('staff.index', compact('staff'));
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

    }

    // Show the form for creating a new model instance
    //public function create()
    //{
    //    return view('staff.create');
    //}

    // Store a newly created model instance in storage
    public function store(Request $request)
    {
        try {
        Staff::create($request->all());
        }
        catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

//        return redirect()->route('staff.index');
    }

    // Display the specified model instance
    public function show($id)
    {
        try {
            $staff = Staff::findOrFail($id);
//        return view('staff.show', compact('staff'));
            return response()->json($staff);

        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

    }

    // Show the form for editing the specified model instance
    //public function edit($id)
    //{
    //    $staff = Staff::findOrFail($id);
    //    return view('staff.edit', compact('staff'));
    //}

    // Update the specified model instance in storage
    public function update(Request $request, $id)
    {
        try {
            Staff::findOrFail($id)->update($request->all());
            return response();
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

        // return redirect()->route('staff.index');
    }

    // Remove the specified model instance from storage
    public function destroy($id)
    {
        try {
            Staff::findOrFail($id)->delete();
            return response();
            // return redirect()->route('staff.index');
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

    }
}
