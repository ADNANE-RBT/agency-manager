<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    // Display a listing of the model
    public function index()
    {
        try {
            return response()->json(Agency::paginate(10));
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }
        //return view('agency.index', compact('agency'));
    }

    // Show the form for creating a new model instance
    //public function create()
    //{
    //    return view('agency.create');
    //}

    // Store a newly created model instance in storage
    public function store(Request $request)
    {
        try {
            Agency::create($request->all());
//            return redirect()->route('agency.index');
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

    }

    // Display the specified model instance
    public function show($id)
    {
        try {
            $agency = Agency::findOrFail($id);
//            return view('agency.show', compact('agency'));
            return response()->json($agency);
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

    }

    // Show the form for editing the specified model instance
    //public function edit($id)
    //{
    //    $agency = Agency::findOrFail($id);
    //    return view('agency.edit', compact('agency'));
    //}

    // Update the specified model instance in storage
    public function update(Request $request, $id)
    {
        try {
            Agency::findOrFail($id)->update($request->all());
            return response();
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

        // return redirect()->route('agency.index');
    }

    // Remove the specified model instance from storage
    public function destroy($id)
    {
        try {
            Agency::findOrFail($id)->delete();
            return response();
        }catch ( \Throwable $th){
            return response()->json(['message'=>$th->getMessage()], status:404);
        }

        // return redirect()->route('agency.index');
    }

}
