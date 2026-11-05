<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('department.index', [
        'title' => 'department',
        'departments' => Department::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create', [
            'title' => 'Create Department'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama jurusan wajib diisi'
        ]);

    
        Department::create($validated);
        return to_route('department.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
           return view('department.show', [
        'title' => ' detail department ' . $department->name ,
        'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', [
        'title' => 'Edit Department',
        'department' => $department
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
        'name' => 'required'
    ], [
        'name.required' => 'Nama jurusan wajib diisi'
    ]);

    $department->update($validated);
    return to_route('department.index')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
         $department->delete();
        return to_route('department.index')->withSuccess('Data Berhasil Di Hapus');
    }
}
