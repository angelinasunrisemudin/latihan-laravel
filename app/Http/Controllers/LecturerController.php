<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    public function index()
    {
        return view('lecturer.index', [
            'title' => 'lecturer',
            'lecturers' => Lecturer::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('lecturer.create', [
            'title' => 'Create lecturer',
            'departments' => Department::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024'
        ],
        [
            'name.required' => 'Nama wajib di input',
            'department_id.required' => 'Program Studi Wajib dipilih',
            'avatar.image' => 'avatar harus berupa gambar',
            'avatar.mimes' => 'Format avatar adalah png, jpg, jpeg, webp',
            'avatar.max' => 'ukuran avatar maksimum 1Mb',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('lecturers', 'public');
        }

        Lecturer::create($validated);
        return to_route('lecturer.index')->withSuccess('Data Berhasil Di Tambahkan');
    }

    public function show(Lecturer $lecturer)
    {
        //
    }

    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit', [
            'title' => 'Edit lecturer',
            'departments' => Department::latest()->get(),
            'lecturer' => $lecturer,
        ]);
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024'
        ],
        [
            'name.required' => 'Nama wajib di input',
            'department_id.required' => 'Program Studi Wajib dipilih',
            'avatar.image' => 'avatar harus berupa gambar',
            'avatar.mimes' => 'Format avatar adalah png, jpg, jpeg, webp',
            'avatar.max' => 'ukuran avatar maksimum 1Mb',
        ]);

        if ($request->hasFile('avatar')) {
            if ($lecturer->avatar) {
                Storage::disk('public')->delete($lecturer->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('lecturers', 'public');
        }

        $lecturer->update($validated);
        return to_route('lecturer.index')->withSuccess('Data Berhasil Di Ubah');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return to_route('lecturer.index')->withSuccess('Data Berhasil Di Hapus');
    }
}