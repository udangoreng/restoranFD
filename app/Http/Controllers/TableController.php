<?php

namespace App\Http\Controllers;

use App\Models\CustTable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = CustTable::all();
        return view('admin.table', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required|string|unique:cust_tables|max:5',
            'capacity' => 'required|numeric|min:0|max:10',
        ]);

        $data = $request->all();

        CustTable::create($data);
        return redirect()->route('admin.table')->with('Success', 'Menu created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = CustTable::findOrFail($id);
        return view('admin.detailtable', compact('table'));
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $table = CustTable::findOrFail($id);
        $request->validate([
            'table_number' => 'required|string|unique:cust_tables|max:5',
            'capacity' => 'required|numeric|min:0|max:10',
        ]);

        $data = $request->all();

        $res = $table->update($data);
        return redirect()->route('admin.table')->with('Success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = CustTable::findOrFail($id);
        $table->delete();

        return redirect()->route('admin.table')->with('success', 'Menu deleted successfully.');
    }
}
